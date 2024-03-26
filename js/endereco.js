jQuery(function($){
  

    jQuery("#cep").mask("00000-000",{placeholder:"_____ - ___"});
    });
    
    jQuery(function($){
    
    jQuery("#numero").mask("000000",{placeholder:"_____"});
    });
    
    
    
         jQuery(document).ready(function() {
    
             function limpa_formulário_cep() {
                 // Limpa valores do formulário de cep.
                 $("#rua").val("");
                 $("#bairro").val("");
                 $("#cidade").val("");
                 $("#uf").val("");
                 $("#ibge").val("");
             }
             
             //Quando o campo cep perde o foco.
             jQuery("#cep").blur(function() {
    
                 //Nova variável "cep" somente com dígitos.
                 var cep = jQuery(this).val().replace(/\D/g, '');
    
                 //Verifica se campo cep possui valor informado.
                 if (cep != "") {
    
                     //Expressão regular para validar o CEP.
                     var validacep = /^[0-9]{8}$/;
    
                     //Valida o formato do CEP.
                     if(validacep.test(cep)) {
    
                         //Preenche os campos com "..." enquanto consulta webservice.
                         jQuery("#rua").val("");
                         jQuery("#bairro").val("");
                         jQuery("#cidade").val("");
                         jQuery("#uf").val("");
                         
    
    
                         //Consulta o webservice viacep.com.br/
                         jQuery.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
    
                             if (!("erro" in dados)) {
                                 //Atualiza os campos com os valores da consulta.
                                 jQuery("#rua").val(dados.logradouro);
                                 jQuery("#bairro").val(dados.bairro);
                                 jQuery("#cidade").val(dados.localidade);
                                 jQuery("#uf").val(dados.uf);
                                 document.getElementById('cep').style.border = "1px solid #2e29bc";
                                 document.getElementById('cep').style.background = "#fff";
                                 document.getElementById('msg_cep').style.display = 'none';	
                                 controle_cep='1';
                                 var element = document.getElementById("cep");
                                 element.classList.remove("erro");
                                 element.classList.add("sucesso");
    
                           
                                
                                if(dados.logradouro.length>1){
                                var element = document.getElementById("rua");
                                 element.classList.remove("erro");	
                                 document.getElementById('rua').style.color = "#333";
                                 document.getElementById('rua').style.background = "#eaeaea";
                                 document.getElementById('rua').style.border = "1px solid #333";
                                 document.getElementById('rua').readOnly = true;
                                 }else{
                                    document.getElementById('rua').style.background = "#fff";
                                    document.getElementById('rua').readOnly = false;
                                 }
    
    
    
                                 if(dados.bairro.length>1){
                                var element = document.getElementById("bairro");
                                 element.classList.remove("erro");	
                                 document.getElementById('bairro').style.color = "#333";
                                 document.getElementById('bairro').style.background = "#eaeaea";
                                 document.getElementById('bairro').style.border = "1px solid #333";
                                 document.getElementById('bairro').readOnly = true;
                                 }else{
                                    document.getElementById('bairro').style.background = "#fff";
                                    document.getElementById('bairro').readOnly = false;
                                 }
    
                                // console.log(dados.localidade.length);
    
                                 var element = document.getElementById("cidade");
                                 element.classList.remove("erro");	
                                
                                 if(dados.localidade.length>1){
                                 document.getElementById('cidade').style.color = "#333";
                                 document.getElementById('cidade').style.background = "#eaeaea";
                                 document.getElementById('cidade').style.border = "1px solid #333";
                                 document.getElementById('cidade').readOnly = true;
                                 }else{
                                    document.getElementById('cidade').readOnly = true;
                                    document.getElementById('cidade').style.background = "#fff";
                                 }
    
                                // console.log(dados.uf.length);
                                 if(dados.uf.length>1){
                                 var element = document.getElementById("uf");
                                  element.classList.remove("erro");	
                                  document.getElementById('uf').style.background = "#eaeaea";
                                  document.getElementById('uf').style.color = "#333";
                                  document.getElementById('uf').style.border = "1px solid #333";
                                  document.getElementById('uf').readOnly = true;
                                 }else{
                                    document.getElementById('uf').readOnly = false;
                                    document.getElementById('uf').style.background = "#fff";
                                 }
                                 //Não deixa editar
                            
                                
                                 
                             
                             } //end if.
                             else {
                                 //CEP pesquisado não foi encontrado.
                                 limpa_formulário_cep();
    
                            
                                 document.getElementById('cep').style.border = "1px solid #a8002c";
                                 document.getElementById('cep').style.background = "#fff";
                                 document.getElementById('msg_cep').style.display = 'block';	
                                 controle_cep='0';
                                 var element = document.getElementById("cep");
                                 element.classList.remove("sucesso");
                                 element.classList.add("erro");
                            
    
                                 document.getElementById('rua').readOnly = false;
                                 document.getElementById('bairro').readOnly = false;
                                 document.getElementById('cidade').readOnly = false;
                                 document.getElementById('uf').readOnly = false;
                                 
                                 
                             }
                         });
                     } //end if.
                     else {
                         //cep é inválido.
                           limpa_formulário_cep();
                           document.getElementById('cep').style.border = "1px solid #a8002c";
                           document.getElementById('cep').style.background = "fff";
                           document.getElementById('msg_cep').style.display = 'block';	
                           controle_cep='0';
                           var element = document.getElementById("cep");
                           element.classList.remove("sucesso");
                           element.classList.add("erro");
                         
    
                    
                                 document.getElementById('rua').readOnly = false;
                                 document.getElementById('bairro').readOnly = false;
                                 document.getElementById('cidade').readOnly = false;
                                 document.getElementById('uf').readOnly = false;
    
    
                    
                     }
                 } //end if.
                 else {
                     //cep sem valor, limpa formulário.
                     limpa_formulário_cep();
                     document.getElementById('msg_cep').style.display = 'none';	
                           controle_cep='0';
                           var element = document.getElementById("cep");
                           element.classList.remove("sucesso");
                           element.classList.add("erro");
    
                           
                                 document.getElementById('rua').readOnly = false;
                                 document.getElementById('bairro').readOnly = false;
                                 document.getElementById('cidade').readOnly = false;
                                 document.getElementById('uf').readOnly = false;
                          
                 }
             });
         });
    
    