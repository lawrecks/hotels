function scooby () {
    let cHead = document.getElementById('head');
    let vowel = ['a','e','i','o','u'];
    let cInput = [];
    let input = document.getElementById('data').value;
    for(j = 0; j < input.length; j++){
        cInput.push(input[j]);
    }
    for(i = 0; i < cInput.length; i++){
        if (cInput[0] === vowel[0] || cInput[0] === vowel[1] || cInput[0] === vowel[2] || cInput[0] === vowel[3]
        || cInput[0] === vowel[4]) {
                cHead.innerHTML = "R" + input;
        }
        else {
            for (k = 1; k < cInput.length; k++) {
                cHead.innerHTML = "R" + input[k];
            }

        }
    }
}
