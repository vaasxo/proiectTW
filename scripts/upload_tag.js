function add_tag_field(){
    const container = document.getElementById('item-for-tags')
    const button = document.getElementById('button_plus')
    container.removeChild(button)
    let label = document.createElement("label")
    label.setAttribute("for","tags")
    label.textContent = "Enter another tag:"
    container.appendChild(label)
    let input = document.createElement("input")
    input.className = "item-input"
    input.type = "text"
    input.id = "tags"
    input.name = "tags"
    input.placeholder="Tag"
    container.appendChild(input)
    console.log("input added")
    container.appendChild(button)
    container.appendChild(document.createElement("br"))
}