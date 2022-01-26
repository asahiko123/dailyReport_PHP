feather.replace();

const key = 'attribute';
const value = 'active';
const data = sessionStorage.getItem(key);

if(data){

    document.querySelectorAll('.nav-link').forEach((z,index)=>{
        const flg=index==data;
        z.classList.toggle('active',flg);
    })
}


document.addEventListener('click', (e)=>{

    const x = e.target;

    if(x.classList.contains('nav-link')){
        document.querySelectorAll('.nav-link').forEach((y,index) =>{

            const flg=x==y;
            y.classList.toggle('active',flg);

            if(flg){

                console.log(`${index}`);
                sessionStorage.setItem(key,`${index}`);

            }

        });
    }

});

