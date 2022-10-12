const btn1 = document.getElementById('btn1');
const btn2 = document.getElementById('btn2');

function confirmMsg(Btn){
    Btn.addEventListener('click',(e)=>{
        const msg = confirm('本当に削除しますか？');
        if(!msg){
            e.preventDefault();
        };
    });
}

confirmMsg(btn1);
confirmMsg(btn2);

