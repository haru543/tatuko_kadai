// 必要な要素を変数に入れる
const startBtn = document.getElementById('start');
const appArea = document.getElementById('app');
const courseName = document.getElementById('courseName');


//labの出席番号を配列にPUSH
let personArray = [];
for(let j=1; j<=40; j++){
    personArray.push(j);
}

//devの出席番号を配列にpush
let personArray2 = [];
for(let z=1; z<=50; z++){
    personArray2.push(z);
}



//labをrandomにする
const shuffleArray = function() {
    for (let i = personArray.length-1; i>0; i--){
        const r = Math.floor(Math.random() * (i + 1));
        const tmp = personArray[i];
        personArray[i] = personArray[r];
        personArray[r] = tmp;
    }
};
shuffleArray();

//Devをrandomにする
const shuffleArray2 = function() {
    for (let i = personArray2.length-1; i>0; i--){
        const r = Math.floor(Math.random() * (i + 1));
        const tmp = personArray2[i];
        personArray2[i] = personArray2[r];
        personArray2[r] = tmp;
    }
};
shuffleArray2();

//lab座席表
function labTable() {
    let div = '';
    personArray.forEach(function(data, i) {
        if((i+1) % 5 == 0){
            div += '<div class="seat">'+ data +'</div></div>';
        }else if((i+1) % 5 == 1){
            div += '<div class="table-item text-center"><div class="seat">'+ data +'</div>';
        }else { 
            div += '<div class="seat">'+ data +'</div>';
        }
    });
    appArea.innerHTML = div;
};

//dev座席表
function devTable() {
    let div = '';
    personArray2.forEach(function(data, i) {
        if((i+1) % 5 == 0){
            div += '<div class="seat">'+ data +'</div></div>';
        }else if((i+1) % 5 == 1){
            div += '<div class="table-item text-center"><div class="seat">'+ data +'</div>';
        }else { 
            div += '<div class="seat">'+ data +'</div>';
        }
    });
    appArea.innerHTML = div;
};

// スタートボタンを押したら表示する
startBtn.addEventListener('click', function() {
    switch (courseName.selectedIndex){
        case 0:
            labTable();
            break;
        case 1:
            alert('DEV');
            devTable();
            break;
    }
    
});