


$('#start_mth, #start_year, #end_mth, #end_year').change(function() {
    var start_mth, start_year, end_mth, end_year;

    start_mth = $('#start_mth').val() != 'all' ? $('#start_mth').val() : 'all';
    start_year = $('#start_year').val() != 'all' ? $('#start_year').val() : 'all';

    end_mth = $('#end_mth').val() != 'all' ? $('#end_mth').val() : 'all';
    end_year = $('#end_year').val() != 'all' ? $('#end_year').val() : 'all';
    

    $(".report").attr("href", SITE_URL + "/relatorio_compras/" + di + "/" + df + "/" + estado);
    $(".relatorio_compras_excel").attr("href", SITE_URL + "/relatorio_compras_excel/" + di + "/" + df + "/" + estado);
});

let mySelect = new vanillaSelectBox(".select_inp", {
    maxWidth: 500,
    maxHeight: 400,
    minWidth: -1,
    search: true,
    placeHolder: "Selecione o Consultor...."
});

// Alterando a action do form ao pressionar um botao especifico
var submitForm = function(method){
    var formAction = SITE_URL + '/report/' + method;

    //set form action
    $('#reportForm').attr('action', formAction);
    //submit form
    $('#reportForm').submit();
};
 
$(document).on('click', '#chartBtn', function(){
    //set your method - list
    submitForm('chart');
})

$(document).on('click', '#listBtn', function(e){
    //set your method - list
    submitForm('list');
})


.on('click', '#btnSave', function(){
    //set your method - update
    submitForm('update');
});


