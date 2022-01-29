document.addEventListener('click',(e) =>{

    const x = e.target;

    if(x.classList.contains('cell')){

        document.querySelectorAll('.cell').forEach((y) =>{

            const flg=x==y;
            y.classList.toggle('active',flg);

            const circle = document.getElementById('circle');
            const stacked = document.getElementById('stacked');


            if(flg && x.innerText == "個人データ"){
                circle.style.display = 'block';
                stacked.style.display = 'none';
            }else if(flg && x.innerText == "全体比較"){
                circle.style.display = 'none';
                stacked.style.display = 'block';
            }
        });
    }
});