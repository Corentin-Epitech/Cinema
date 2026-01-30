document.getElementById('submit').addEventListener('click', function(event) {
    event.preventDefault()
    form = document.getElementById('form')
    fetch(form.action, {method:'POST', body: new FormData(form)});
})

// fetch = 'http://localhost:8000/api/movies/{id}'

function supprimer(e) {
   
    $id = e.getAttribute('id')
    console.log($id)
    fetch('http://localhost:8000/backEnd/api.php?id=' . $id, { method: 'DELETE'})
    .then(res => res.text()) // or res.json()
    .then(res => console.log(res))
}