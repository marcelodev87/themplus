/// verificar porque está dando erro quando coloca duas funções JS

// MASK
var cellMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
    cellOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(cellMaskBehavior.apply({}, arguments), options);
        }
    };

$('.mask-cell').mask(cellMaskBehavior, cellOptions);
$('.mask-phone').mask('(00) 0000-0000');
$(".mask-date").mask('00/00/0000');
$(".mask-datetime").mask('00/00/0000 00:00');
$(".mask-month").mask('00/0000', { reverse: true });
$(".mask-doc").mask('000.000.000-00', { reverse: true });
$(".mask-cnpj").mask('00.000.000/0000-00', { reverse: true });
$(".mask-zipcode").mask('00000-000', { reverse: true });
$(".mask-money").mask('R$ 000.000.000.000.000,00', { reverse: true, placeholder: "R$ 0,00" });
// SEARCH ZIPCODE

$(document).ready(function () {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#street").val("");
        $("#neighborhood").val("");
        $("#city").val("");
        $("#state").val("");
    }

    //Quando o campo cep perde o foco.
    $("#zipcode").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#street").val("...");
                $("#neighborhood").val("...");
                $("#city").val("...");
                $("#state").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#street").val(dados.logradouro);
                        $("#neighborhood").val(dados.bairro);
                        $("#city").val(dados.localidade);
                        $("#state").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

