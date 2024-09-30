
document.addEventListener("DOMContentLoaded", function() {
    const apiUrl = "todo-api.php"; 
   
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const todoList = document.getElementById("todo-list");
            data.forEach(todo => {
                const li = document.createElement("li");
                li.textContent = todo.title;  
                todoList.appendChild(li);
            });
        })
        .catch(error => console.error("Fehler beim Abrufen der Todos:", error));

    const form = document.getElementById("todo-form");
    const input = document.getElementById("todo-input");

    form.addEventListener("submit", function(event) {
        event.preventDefault();  
        const title = input.value.trim();
        if (title) {
            addTodo(title); 
            input.value = "";
        }
    });
});
