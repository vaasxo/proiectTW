function add_tag_field(){
    const container = document.getElementById('item-for-tags')
    const tags_list = document.getElementsByClassName("tag_input")
    let last=tags_list[tags_list.length-1]
    const last_id=parseInt(last.name.substring(4))
    console.log(last_id);
    const tag_container_list = document.getElementsByClassName('new-tag')
    let tag_container = tag_container_list[tag_container_list.length-1]
    const button = document.getElementById('button_plus')
    tag_container.removeChild(button)
    let new_tag_container = document.createElement("div")
    new_tag_container.className = "new-tag"
    new_tag_container.id = "new-tag"
    let label = document.createElement("label")
    label.setAttribute("for","tags")
    label.textContent = "Add autograph tag"
    new_tag_container.appendChild(label)
    let input = document.createElement("input")
    input.className = "tag_input"
    input.id = "tag_input"
    input.type = "text"
    let this_id=last_id+1;
    input.name = `tags${this_id.toString()}`
    new_tag_container.appendChild(input)
    console.log("input added")
    new_tag_container.appendChild(button)
    container.appendChild(new_tag_container)

}