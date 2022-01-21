feather.replace();

const key = 'attribute';
const value = 'active';
const data = sessionStorage.getItem(key);


document.addEventListener('click', (e)=>{

    const x = e.target;

    if(x.classList.contains('nav-item')){
        document.querySelectorAll('nav-item').forEach(y =>{
            
            const flg=x==y;
            y.classList.toggle('active',flg);

            sessionStorage.setItem(key,value);
          
        });
    }
    
});
