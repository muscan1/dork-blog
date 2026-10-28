function buildDork(){
    //Reads what the user typed.trim removes space from the start and the end
    let site = document.getElementById("SiteInput").value.trim();
    let fileType = document.getElementById("FileInput").value.trim();
    let keyword = document.getElementById("KeywordInput").value.trim();

    //Find the two paragraphs that we will write 
    let resultBox = document.getElementById("result");
    let countbox = document.getElementById("OperatorCount");
    //Validation atleast one box must be filled in
    if( site ==="" && fileType === "" && keyword === ""){
        resultBox.textContent = "Please fill atleast one box.";
        resultBox.style.color = "Red";
        countbox.textContent = ""
        return;
    }
    let query = "";
    let operators = 0;
    if(site !== ""){
        query = query + "site:" + site + " ";
        operators = operators + 1;
    }
    if (fileType !== "") {
        query = query + "filetype:" + fileType + " ";
        operators = operators + 1;
    }
 
    if (keyword !== "") {
       query = query + '"' + keyword + '"';
    }
    // Show the results on the page
    resultBox.textContent = query.trim();
    resultBox.style.color = "green";
    countBox.textContent = "Operators used: " + operators;
}