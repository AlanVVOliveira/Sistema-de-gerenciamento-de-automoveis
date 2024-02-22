var html = '';
$.get( "../controllers/exibirVeiculos.php",
        { 
            //visualizandoVeiculo: ""
            veiculoController:"" 
        }, 
        function (data) {

            var array = $.parseJSON(data);

            array.forEach(function (element) {
                html += '<tr class='+element.id+'>';
                html += '<td>'+element.id+'</td>';
                html += '<td>'+element.fabricante+'</td>';
                html += '<td>'+element.modelo+'</td>';
                html += '<td>'+element.ano+'</td>';
                html += '<td>'+element.versao+'</td>';
                html += '<td>'+element.combustivel+'</td>';
                html += '<td>'+element.motorizacao+'</td>';
                html += '<td>'+element.placa+'</td>';
                html += '<td>'+element.valorCompra+'</td>';
                html += '<td>'+element.valorVenda+'</td>';
                html += '<td>'+element.margemLucro+'</td>';
                html += '<td>'+element.data_cadastro+'</td>';

                html +='<td><button id='+element.id+' type="button" onclick="removerVeiculo(this.id)" class="btn btn-danger">Remover</button></td>';
                html +="</tr>";
              });$('#table').append(html);
            }
)


function removerVeiculo(clicked) {
    if (confirm("Tem certeza que deseja remover este registro?") == true) {
      var id = clicked;
      $.post("../controllers/removerVeiculo.php", 
      { id }).done(function(data) {
          $('tr').remove('.'+id.toString());
            }
        )
    } 
}

function editarVeiculo() {
    window.location.replace("paginaAtualizarVeiculos.php");
}

