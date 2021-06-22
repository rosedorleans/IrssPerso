
// Carte interactive

const map = document.querySelector('.map')
const paths = map.querySelectorAll('.map-image a')
const links = map.querySelectorAll('.map-text a')

if (NodeList.prototype.forEach === undefined) {
    NodeList.prototype.forEach = function (callback) {
        [].forEach.call(this, callback)
    }
}

const activeArea = function (id) {
    map.querySelectorAll('.is-active').forEach(function (item) {
        item.classList.remove('is-active')
    })
    if (id !== undefined) {
        document.querySelector('#btn-' + id).classList.add('is-active')
        document.querySelector('#list-' + id).classList.add('is-active')
    }
}

paths.forEach(function (path) {
    path.addEventListener('mouseenter', function () {
        const id = this.id.replace('btn-','' )
        activeArea(id)
    })
})

links.forEach(function (link) {
    link.addEventListener('mouseenter', function () {
        const id = this.id.replace('list-','' )
        activeArea(id)
    })
})

map.addEventListener('mouseleave', function () {
    activeArea()
})




// Modal

const modal = document.getElementById("myModal");
const btn = document.getElementById("btn-caen");
const span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}