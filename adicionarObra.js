$(function () 
  {
      $("#instrumento1").load("getInstrumentos.php");
      $("#voz1").load("getVozes.php");
      $("#categoria").load("getCategorias.php");

      var icont = 1;
      
      $("#ad-subtitulo").click( function()
        {
            $("#ad-subtitulo").remove();
            $("#metaTabela").append("<tr><td>Subtítulo:</td>"+
                                    "<td><input type='text' size='30' id='subtitulo' name='subtitulo'/></td></tr>");
        }
      );
      
      $("#ad-desc").click( function()
        {
            $("#ad-desc").remove();
            $("#metaTabela").append("<tr><td>Descrição:</td>"+
                                    "<td><input type='text' size='60' id='desc' name='desc'/></td></tr>");
        }
      );
      
      $("#ad-arranjo").click( function()
        {
            $("#ad-arranjo").remove();
            $("#metaTabela").append("<tr><td>Arranjo:</td>"+
                                    "<td><input type='text' size='30' id='arranjo' name='arranjo'/></td></tr>");
        }
      );
      $("#ad-compositor").click( function()
        {
            $("#ad-compositor").remove();
            $("#metaTabela").append("<tr><td>Compositor:</td>"+
                                    "<td><input type='text' size='30' id='compositor' name='compositor'/></td></tr>");
        }
      );

      $("#adInstrumento").click( function()
        {
            icont++;
            
            $("#listaInstrumentos").append("<div id='i"+icont+"' style='margin-bottom:10px;'></div>");
            
            $("#i"+icont).append("<label for='instrumento"+icont+"'>Instrumento: </label>");
            
            $("#instrumento1").clone(false)
                              .attr("id","instrumento"+icont)
                              .attr("name","instrumento["+icont+"]")
                              .appendTo("#i"+icont);
                              
            $("#i"+icont).append("<label for='clave"+icont+"'> Clave: </label>");                  
                              
            $("#clave1").clone(false)
                              .attr("id","clave"+icont)
                              .attr("name","clave["+icont+"]")
                              .appendTo("#i"+icont);
                              
            $("#i"+icont).append("<label for='voz"+icont+"'> Voz: </label>");                  
                              
            $("#voz1").clone(false)
                              .attr("id","voz"+icont)
                              .attr("name","voz["+icont+"]")
                              .appendTo("#i"+icont);
                              
            $("#i"+icont).append("<label for='afinacao"+icont+"'> Afinação: </label>");                  
                              
            $("#afinacao1").clone(false)
                              .attr("id","afinacao"+icont)
                              .attr("name","afinacao["+icont+"]")
                              .appendTo("#i"+icont);
                              
            $("#i"+icont).append("<br/>")
                         .append("<label for='partitura"+icont+"'>Ficheiro da partitura: </label>")
                         .append("<input type='file' name='partitura["+icont+"]' id='partitura"+icont+"'/>")
                         .append("<br/>");
        }
      );
      $("#remInstrumento").click( function()
        {
            if(icont > 1)
            {
              $("#i"+icont).remove();
              icont--;
            }
            else
            {
              alert("Já não pode remover mais instrumentos...");
            }
        }
      );

      $("#enviar").click(function()
      {
        $("#instrumentos").append("<input type='hidden' name='icont' value='"+icont+"'/>");
        $("#myform").submit();
      });
      
  });

