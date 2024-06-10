class Model {
    constructor() {

    }
}

class View {
    constructor() {
        this.userList = document.getElementById('user-list');
        this.inventoryList = document.getElementById('inventory-list');
        this.userWindowBtn = document.getElementById('users');
        this.inventoryWindowBtn = document.getElementById('inventory');

    }

    showUser() {
        this.userList.style.display='block';
        
    }
    hideUser() {
        this.userList.style.display='none';
    }
    showInventory() {
        this.inventoryList.style.display='block';
    }
    hideInventory() {
        this.inventoryList.style.display ='none';
    }

}

class Controller {
    constructor(model, view) {
        this.model = model;
        this.view = view;
        this.view.inventoryWindowBtn.addEventListener('click', () => this.showInventory());
        this.view.userWindowBtn.addEventListener('click', () => this.showUser());
    }   

    showInventory() {
        this.view.showInventory();
        this.view.inventoryWindowBtn.style.backgroundColor= '#BAA390';
        this.view.userWindowBtn.style.backgroundColor= '#E2D2C3';
        this.view.hideUser();
        
    }

    showUser() {
        this.view.showUser();
        this.view.hideInventory();
        this.view.userWindowBtn.style.backgroundColor= '#BAA390';
        this.view.inventoryWindowBtn.style.backgroundColor= '#E2D2C3';

    }
    
}

// Create instances of Model, View, and Controller
document.addEventListener('DOMContentLoaded', () => {
    const model = new Model();
    const view = new View();
    const controller = new Controller(model, view);
    controller.showInventory();
    // controller.showInventory();
});
