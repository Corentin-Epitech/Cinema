document.getElementById('submit').addEventListener('click', function(event) {
    event.preventDefault()
    form = document.getElementById('form')
    fetch(form.action, {method:'post', body: new FormData(form)});
})

