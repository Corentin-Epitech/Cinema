document.getElementById('submit').addEventListener('click', function (event) {
    event.preventDefault()
    $id = document.getElementById("input-id")
    if ($id.value == '') {
        form = document.getElementById('form')
        fetch(form.action, { method: 'POST', body: new FormData(form) })
    }
    else {
        $formData = new FormData(form)
        var $object = {};
        $formData.forEach(function (value, key) {
            $object[key] = value;
        });
        var $json = JSON.stringify($object);
        console.log($json)
        fetch('http://localhost:8000/backEnd/moviesModels.php', { method: 'PUT', header : "Content-Type: application/json", body: $json})
        .then(res => res.text()) // or res.json()
        .then(res => console.log(res))
    }
})

// fetch = 'http://localhost:8000/api/movies/{id}'

function supprimer(e) {
    $id = e
    fetch('http://localhost:8000/backEnd/moviesModels.php?id=' + $id.parentNode.parentNode.id, { method: 'DELETE' })
        .then(res => res.text()) // or res.json()
        .then(res => console.log(res))
}

function modifier(e) {
    $id = e
    $InputId = document.getElementById('input-id')
    $title = document.getElementById('input-title')
    $desc = document.getElementById('input-desc')
    $dur = document.getElementById('input-dur')
    $year = document.getElementById('input-year')
    $genre = document.getElementById('input-genre')
    $dir = document.getElementById('input-dir')
    $create = document.getElementById('input-create')
    $update = document.getElementById('input-update')

    fetch('http://localhost:8000/backEnd/moviesModels.php?id=' + $id.parentNode.parentNode.id, { method: 'GET' })
        .then(res => res.json()) // or res.json()
        .then(data => [$InputId.setAttribute('value', data['id']),
        $title.setAttribute('value', data['title']),
        $desc.setAttribute('value', data['description']),
        $dur.setAttribute('value', data['duration']),
        $year.setAttribute('value', data['release_year']),
        $genre.setAttribute('value', data['genre']),
        $dir.setAttribute('value', data['director']),
        $create.setAttribute('value', data['created_at']),
        $update.setAttribute('value', data['updated_at'])
        ]
        )



}

// function add(event) {
//     $id = document.getElementById("input-id")
//     if ($id.value == '') {
//     form = document.getElementById('form')
//     fetch(form.action, {method:'POST', body: new FormData(form)})
//     } 
//     else {
//         fetch(form.action, {method:'PUT', body: new FormData(form)})
//     }
// }