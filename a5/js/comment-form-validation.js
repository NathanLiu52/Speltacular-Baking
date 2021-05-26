const NAME = "USER_COMMENT_FORM_NAME";
const COMMENT_AREA = "USER_COMMENT_FORM_TEXT";
const SUBMIT_BUTTON = "submit";
const CLASS = "disabled";

window.addEventListener("load", function() {
    const input = document.getElementById(COMMENT_AREA);
    const submit = document.getElementById(SUBMIT_BUTTON);

    submit.classList.add(CLASS);
    submit.disabled = true;

    input.addEventListener('keyup', function() {
        validateForm(input, submit);
    }); 
})

function validateForm(input, submit){
    const comment = input.value;

    if (comment.trim()) {
        submit.classList.remove(CLASS);
        submit.disabled = false;
    }

    else {
        submit.classList.add(CLASS);
        submit.disabled = true;
    }
}

function confirmCancel(){
    const name = document.getElementById(NAME).value;

    if (!name.trim()) {
        if (confirm("Are you sure you want to post your comment anonymously?")) {
            return true;
        }
        else {
            return false;
        }
    }
}