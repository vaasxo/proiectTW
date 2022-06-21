function get_confirmation_marketplace(){
    if(document.getElementById('marketplace').checked){
        let input_provided = false
        while(!input_provided) {
            let message = window.prompt("Set the autograph available for trading also?(yes/no)")
            if (message === 'yes'){
                alert('Autograph added in marketplace for selling and trading.')
                input_provided = true
            }
            else if (message === 'no'){
                alert('Autograph added in marketplace for selling only.')
                input_provided = true
            }
            else if(message === null){
                alert('Autograph will not be added in marketplace.')
                document.getElementById('marketplace').checked = false;
                break;
            }
            else
                alert('Invalid input. Please enter yes/no.')
        }

    }else{
        let input_provided = false
        while(!input_provided) {
            let message = window.prompt("Remove this autograph from marketplace for trading only?(yes/no)")
            if (message === 'yes'){
                alert('Autograph removed from marketplace for trading. Still available for selling.')
                input_provided = true
            }
            else if (message === 'no'){
                alert('Autograph removed from marketplace for trading and selling.')
                input_provided = true
            }
            else if(message === null){
                alert('Autograph not removed from marketplace.')
                break;
            }
            else
                alert('Invalid input. Please enter yes/no.')
        }
    }
}
// function get_bid_amount(){
//     let content = document.getElementById('bid_amount')
//     let amount = window.prompt("Enter the bid amount in $")
//     if(amount !== null){
//
//         var httpc = new XMLHttpRequest();
//         httpc.onreadystatechange = function() { //Call a function when the state changes.
//             if(httpc.readyState === 4 && httpc.status === 200) { // complete and no errors
//                 content.innerText = httpc.responseText; // some processing here, or whatever you want to do with the response
//             }
//             else{
//                 content.innerText = "n-a mers"
//             }
//         };
//         httpc.open('GET', 'send_notification?q='+amount+'%'+Date.now(), true);
//         httpc.send();
//     }
//
// }