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
    controller.showUser();
    // controller.showInventory();
});



// // Example JavaScript code to toggle the display of the section
// document.addEventListener("DOMContentLoaded", function() {
//     // Assuming some condition to determine when to display the section
//     if (someCondition) {
//         document.getElementById("user-list").style.display = "block";
//     }
// });

/*
document.addEventListener('DOMContentLoaded', () => {
    const rows = 6;
    const columns = 7;
    const model = new GameModel(rows, columns);
    model.loadState(); 
    const view = new View();
    new Controller(model, view);
    view.renderBoard(model.board.grid); 
}); */