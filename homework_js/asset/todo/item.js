export class Item
{
	title;
	deleteButtonHandler;
	updateButtonHandler;

	constructor({title, deleteButtonHandler, updateButtonHandler})
	{
		this.title = String(title);
		if (typeof deleteButtonHandler === 'function')
		{
			this.deleteButtonHandler = deleteButtonHandler;
		}
		if (typeof updateButtonHandler === 'function')
		{
			this.updateButtonHandler = updateButtonHandler;
		}
	}

	getData()
	{
		return {title: this.title};
	}

	render()
	{
		const container = document.createElement('div');
		container.classList.add('item-container');
		const title = document.createElement('div');
		title.classList.add('item-title');
		title.innerText = this.title;
		container.append(title);

		const buttonsContainer = document.createElement('div');
		const deleteButton = document.createElement('button');
		const updateButton = document.createElement('button');
		deleteButton.innerText = 'Delete';
		updateButton.innerText = 'Update';
		buttonsContainer.append(deleteButton);
		buttonsContainer.append(updateButton);
		deleteButton.addEventListener('click', this.handleDeleteButtonClick.bind(this));
		updateButton.addEventListener('click', this.handleUpdateButtonClick.bind(this));

		container.append(buttonsContainer);

		return container;
	}

	handleUpdateButtonClick()
	{
		if (this.updateButtonHandler)
		{
			this.updateButtonHandler(this);
		}
	}

	handleDeleteButtonClick()
	{
		if (this.deleteButtonHandler)
		{
			this.deleteButtonHandler(this);
		}
	}



}