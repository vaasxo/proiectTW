function add_tag_field(){
    const container = document.getElementById('item-for-tags')
    const tag_container_list = document.getElementsByClassName('new-tag')
    let tag_container = tag_container_list[tag_container_list.length-1]
    const button = document.getElementById('button_plus')
    tag_container.removeChild(button)
    let new_tag_container = document.createElement("div")
    new_tag_container.className = "new-tag"
    new_tag_container.id = "new-tag"
    let label = document.createElement("label")
    label.setAttribute("for","tags")
    label.textContent = "Enter another tag:"
    new_tag_container.appendChild(label)
    let input = document.createElement("input")
    input.className = "item-input"
    input.type = "text"
    input.id = "tags"
    input.name = "tags"
    input.placeholder="Tag"
    new_tag_container.appendChild(input)
    console.log("input added")
    new_tag_container.appendChild(button)
    container.appendChild(new_tag_container)
    container.appendChild(document.createElement("br"))
}