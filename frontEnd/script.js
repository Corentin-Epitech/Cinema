function modifier(e) {
    $id = e
    $test = document.getElementById($id.parentNode.parentNode.id).querySelectorAll('td')
    console.log($test)
    $array = Array.from($test)
    console.log($array)
    $array.forEach((element) => console.log(element))

    $InputId = document.getElementById('input-id')
    $title = document.getElementById('input-title')
    $desc = document.getElementById('input-desc')
    $dur = document.getElementById('input-dur')
    $year = document.getElementById('input-year')
    $genre = document.getElementById('input-genre')
    $dir = document.getElementById('input-dir')
    $create = document.getElementById('input-create')
    $update = document.getElementById('input-update')


    $InputId.setAttribute('value', $array[0].innerHTML),
    $title.setAttribute('value', $array[1].innerHTML),
    $desc.setAttribute('value', $array[2].innerHTML),
    $dur.setAttribute('value', $array[3].innerHTML),
    $year.setAttribute('value', $array[4].innerHTML),
    $genre.setAttribute('value', $array[5].innerHTML),
    $dir.setAttribute('value', $array[6].innerHTML),
    $create.setAttribute('value', $array[7].innerHTML),
    $update.setAttribute('value', $array[8].innerHTML)
    }