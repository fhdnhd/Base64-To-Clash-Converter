
copy = () => {
    var copyText = document.getElementById("output");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
  
    document.execCommand("copy", false, "");
    toast("Text Copied!!");
    
}

  generate = (output, input) => {
    document.getElementById('output').value = output;
    document.getElementById('data').value = input;
    if(output != ''){
      document.getElementById('copy').disabled=false;
      document.getElementById('namafile').disabled = false;
      document.getElementById('buatfile').disabled = false;
    }
    //toast("Generated!!");
  }

toast = (isi) =>{
  var element = document.getElementById("toast");
    var content = document.getElementById("isi-toast");
    content.innerHTML = isi;
    var myToast = new bootstrap.Toast(element);
    myToast.show();
}