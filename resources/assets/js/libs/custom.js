

$(function() {

    $('#addNewTransfer').click(function () {

        var table = document.getElementById("transferTable");
        if(table.rows.length == 11){
            alert("send maximum 10 user!");
        }else{
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            // cell1.innerHTML(table.rows.length + 1);
            // cell2.innerHTML($("#sender").val());
            cell1.innerHTML= table.rows.length-1;
            cell2.innerHTML= $("#sender").val();
            cell3.innerHTML= "<input type=\"text\" name=\"receiver[]\" value=\"\">";
            cell4.innerHTML= "<input type=\"text\" name=\"number[]\" value=\"\">";
            cell5.innerHTML= "";
        }
    });

});