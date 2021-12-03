<?php

class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{

	private function getMaxFieldLength(string $fieldName): ?int
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		return $dataGenerator->getFieldValueMaximumLength($fieldName) + 1;
	}

	public function getValidateResultByField(array $fields = []):App\Result
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		return $dataGenerator->validate();
	}


	public function filledField(string $Name = '', string $PersonalAcc = '', string $BankName = '', string $BIC = '', string $CorrespAcc = '',array $fields = []):array
	{
		$newFields = [
			'Name' => $Name,
			'PersonalAcc' => $PersonalAcc,
			'BankName' => $BankName,
			'BIC' => $BIC,
			'CorrespAcc' => $CorrespAcc,
		];

		return array_merge($newFields,$fields);
	}

	public function getValidateFailSamples(): array
	{
		return [
			'empty' => [
				[],
			],
			'filled but empty' => [
				$this->filledField()
			],
			'filled only name' => [
				$this->filledField('Name')
			],
			'filled only personal acc' => [
				$this->filledField('','PersobalAcc')
			],
			'filled only bank name' => [
				$this->filledField('','','BankName')
			],
			'filled only BIC' => [
				$this->filledField('','','','BIC')
			],
			'filled only correspAcc' => [
				$this->filledField('','','','','CorrespAcc')
			],
			'filled but only space' => [
				$this->filledField('     ','      ','     ','      ','      ') //  Считается ли это по ГОСТу допустимо?
			],
		];
	}

	/**
	 * @dataProvider getValidateFailSamples
	 *
	 * @param array $fields
	 */
	public function  testValidateFailEmptyFieldCheck(array $fields): void
	{
		$result = $this->getValidateResultByField($fields);
		static::assertFalse($result->isSuccess());
	}



/*	public function  testValidateFailTypeCheck() :void
	{
		return;
		//Хотел сделать тест для случаев, когда в значение в поле не проходит проверку !$this->isValueTypeValid($value),
		// но или я что-то не понял или у нас такой исход просто невозможен, PHP сам ловит все попытки добавить значения, которые не может привести к строке
	}*/

	public function testValidateFailMaxLengthCheckBigger(): void
	{
		$nameMaxLength= $this->getMaxFieldLength('Name');
		$personalAccMaxLength= $this->getMaxFieldLength('PersonalAcc');
		$bankNameMaxLength= $this->getMaxFieldLength('BankName');
		$bICMaxLength= $this->getMaxFieldLength('BIC');
		$correspAccMaxLength= $this->getMaxFieldLength('CorrespAcc');

		// Забыл. что мы пишем тесты на код, который редко изменяется, поэтому сделал так. В случае если мы знаем что код не меняется,
		// то просто вставим ниже числа вручную


		$nameField = str_repeat('a',$nameMaxLength);
		$personalAccField = str_repeat('a',$personalAccMaxLength);
		$bankNameField = str_repeat('a',$bankNameMaxLength);
		$bICField = str_repeat('a',$bICMaxLength);
		$correspAccField = str_repeat('a',$correspAccMaxLength);

		$fields = $this->filledField($nameField,$personalAccField,$bankNameField,$bICField,$correspAccField);

		$result = $this->getValidateResultByField($fields);

		static::assertFalse($result->isSuccess());
	}



	public function testThatValidateSuccess(): void
	{
		$fields = $this->filledField('Name','PersonalAcc', 'BankName', 'BIC', 'CorrespAcc');

		$result = $this->getValidateResultByField($fields);

		static::assertTrue($result->isSuccess());
	}

	public function testGetData(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$data = $dataGenerator->getData();

		static::assertEquals('ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=', $data);
	}

	public function testPickupDelimiterFirstSymbolEqualDelimiterAndAllPreviousDelimitersUsed():void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$fields = $this->filledField('~|','PersonalAcc', 'BankName', 'BIC', 'CorrespAcc');

		$dataGenerator->setFields($fields);

		$data = $dataGenerator->getData();

		static::assertEquals('ST00012_Name=s~|_PersonalAcc=PersonalAcc_BankName=BankName_BIC=BIC_CorrespAcc=CorrespAcc', $data);
	}



	public function testPickupDelimiterAllPossibleDelimitersUsed():void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$fields = $this->filledField('s~|_#$^&*/`@%','PersonalAcc', 'BankName', 'BIC', 'CorrespAcc');

		$dataGenerator->setFields($fields);

		$data = $dataGenerator->getData();

		static::assertEquals('ST00012|Name=s~|_#$^&*/`@%|PersonalAcc=PersonalAcc|BankName=BankName|BIC=BIC|CorrespAcc=CorrespAcc', $data);
	}

}

