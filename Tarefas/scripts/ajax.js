//Adicionar Tarefa
const btn=document.getElementById('btn-tarefa')

console.log(btn.value)

if(btn.value=='adicionar'){
  btn.addEventListener('click',()=>{
    let input=document.getElementById('text')
    const id=document.getElementById('id')
    ajax=new XMLHttpRequest();
    ajax.open('POST',`../security/Tarefas/tarefas_controller.php?tarefa=`+input.value+'&id='+id.value+"&action=add",true);
    
    ajax.onreadystatechange = function() { // Chama a função quando o estado mudar.
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        document.getElementById('test').innerHTML=''
        pegarTarefas() 
        input.value=''
      }
  }
    ajax.send();
  })
}else{
  btn.addEventListener('click',()=>{
    $.ajax({
      method:'POST',
      url:"../security/Tarefas/controllerTarefas.php",
      data:{action:'remove'},
      dataType:'json',
      success:dados=> console.log(dados),
      error:dados=>console.log(dados)
    })
    document.getElementById('test').innerHTML=''
    pegarTarefas()
  })
}


function pegarTarefas(){
  
  $.ajax({
    type:'post',
    url:"../security/Tarefas/controllerTarefas.php",
    data:{id:$('#id').val(),type:$('#title').val()},//x-www-form-urlencoded
    dataType:'json',
    success:dados=> larray(dados),
    error:erro=> console.log(erro)
  })

}

function larray(dados){
  for(let i=0;i<dados.length;i++){
     tarefa(i+1,dados[i]['tarefa'],dados[i]['id_tarefa']);
  }
}

function tarefa(strong,p,value){
   let divTarefas=document.getElementById('test');
   //console.log(divTarefas)
   
   let todasTarefas=document.createElement('div');
   todasTarefas.className='d-flex align-items-center';
   todasTarefas.setAttribute('id',strong)

   ///UTILITARIOS

  let divUtilitarios=document.createElement('div');
  divUtilitarios.className='col-6 col-sm-4 col-lg-3 col-xl-2';
  
  let spanUtilitarios=document.createElement('span');
  spanUtilitarios.className='btn-group';

  let check=document.createElement('button');
  check.className='fas fa-check-square btn btn-success check';
  check.setAttribute('onclick','check(this.value)');
  check.setAttribute('value',value);

  let trash=document.createElement('button');
  trash.className='fas fa-trash btn btn-danger trash';
  trash.setAttribute('onclick','trash(this.value)');
  trash.setAttribute('value',value);

  let edit=document.createElement('button');
  edit.className='far fa-edit btn btn-info edit';
  edit.setAttribute('onclick','edit(this.value,this,this.id)');
  edit.setAttribute('value',value);
  edit.setAttribute('id',strong);
  
  //INFO TAREFAS

  let divTarefa=document.createElement('div');
  divTarefa.className='ml-2 col-6 col-sm-8 col-lg-9  col-xl-10 pt-3';
  let spanTarefa=document.createElement('span');
  spanTarefa.className='d-flex';

  let strongTarefa=document.createElement('strong');
  strongTarefa.className='mr-1';
  strongTarefa.innerText=strong+'°';

  let pTarefa=document.createElement('strong');
  pTarefa.innerText=p
  
  todasTarefas.appendChild(divUtilitarios)
  divUtilitarios.appendChild(spanUtilitarios);
  spanUtilitarios.appendChild(edit);
  spanUtilitarios.insertBefore(trash,edit);
  spanUtilitarios.insertBefore(check,trash);


  todasTarefas.insertBefore(divTarefa,divUtilitarios);
   divTarefa.appendChild(spanTarefa);
   spanTarefa.appendChild(pTarefa);
   spanTarefa.insertBefore(strongTarefa,pTarefa);
  
   divTarefas.appendChild(todasTarefas);
}

pegarTarefas()

function check(valor){
  console.log('check')
   $.ajax({
     method:'POST',
     url:'../security/Tarefas/controllerTarefas.php',
     data:{action:'check',value:valor},
     error:dados=> console.log(dados)
   })
   
   document.getElementById('test').innerHTML=''
   pegarTarefas()
}

function trash(valor){
   console.log('trash')
   $.ajax({
    method:'POST',
    url:'../security/Tarefas/controllerTarefas.php',
    data:{action:'trash',value:valor},
    error:dados=> console.log(dados)
  })

  document.getElementById('test').innerHTML=''
  pegarTarefas()
}

function edit(valor,elemento,id){
   elemento.setAttribute('disabled',true)            
   divTest=document.getElementById('test')
   divAntes=document.getElementById(id)


  let divEdit=document.createElement('div');
  divEdit.className='input-group px-3 pb-3 col-11';
  divEdit.setAttribute('id','edit');
  
  let inputEdit=document.createElement('input');
  inputEdit.className='form-control';
  inputEdit.setAttribute('placeholder','Edite sua Tarefa')
  inputEdit.setAttribute('id','inputEdit')

  let  buttonEdit=document.createElement('button');
  buttonEdit.className='far fa-edit text-white btn  input-group-append bg-info';
  buttonEdit.setAttribute('id','buttonEdit')
  
  divAntes.after(divEdit)
  divEdit.appendChild(buttonEdit);
  divEdit.insertBefore(inputEdit,buttonEdit);

  //remove Edit
  $('#buttonEdit').click(()=>{
    console.log('remove Edit')

    $.ajax({
      method:'POST',
      url:'../security/Tarefas/controllerTarefas.php',
      data:{action:'edit',value:$('#inputEdit').val(),id_tarefa:valor},
      error:dados=>console.log(dados)
    })
    console.log($('#inputEdit').val())
    document.getElementById('test').innerHTML=''
    pegarTarefas()
  }) 

}


  
 




