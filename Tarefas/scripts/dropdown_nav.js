let normal=false;
function rezise() {
    const dropdown = document.getElementById('dropdown_sm');
    const after_dropdown = document.querySelectorAll('.ex');

    if (window.innerWidth <= 556){
        dropdown.innerHTML = "<a href='home.php' class='nav-link dropdown-toggle active' href='#' id='dropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Tarefas</a> <div class='dropdown-menu bg-danger' aria-labelledby='dropdown'> <a href='home.php' class='dropdown-item'>Todas Tarefas</a> <a href='pendentes.php' class='dropdown-item'>Pendentes</a>  <a href='finalizadas.php' class='dropdown-item'>Finalizadas</a></div></li>";
        dropdown.className = 'nav-item dropdown';
        for (let i = 0; i < after_dropdown.length; i++) {
            after_dropdown[i].remove();
            normal=true;
        }
    }
    
    if(window.innerWidth > 556 && normal){
        title=document.getElementsByTagName('title');
        console.log(title[0].innerHTML);
        dropdown.innerHTML='<a href="home.php" class="">Tarefas</a>'
        if(title[0].innerHTML=='Tarefas')
          dropdown.className='nav-link active'
        else
          dropdown.className='nav-link'

        const list = document.getElementById('list');
        const logoff = document.getElementById('logoff');

        

        let pendentes=document.createElement('li');
        pendentes.className='nav-item ex';
        let pendentes_a=document.createElement('a');
        if(title[0].innerHTML=='Pendentes')
            pendentes_a.className='nav-link active';
        else
            pendentes_a.className='nav-link';
        
        pendentes_a.href='pendentes.php';
        pendentes_a.innerHTML='Pendentes'

        pendentes.appendChild(pendentes_a);
        list.insertBefore(pendentes,logoff)


        let finalizadas=document.createElement('li');
        finalizadas.className='nav-item ex';
        let finalizadas_a=document.createElement('a');
        if(title[0].innerHTML=='Finalizadas')
         finalizadas_a.className='nav-link active';
        else
         finalizadas_a.className='nav-link';

        finalizadas_a.href='finalizadas.php';
        finalizadas_a.innerHTML='Finalizadas'

        finalizadas.appendChild(finalizadas_a);
        list.insertBefore(finalizadas,logoff) 

        normal=false;
        
   }
}