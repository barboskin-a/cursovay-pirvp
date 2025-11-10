document.querySelectorAll('.quantity').forEach(counter=> {
        const input = counter.querySelector('.quantity_input');
        const minus = counter.querySelector('.quantity_btn_minus');
        const plus = counter.querySelector('.quantity_btn_plus');

        plus.addEventListener('click', () =>{
            let value = parseiInt(input.value);
            input.value = ++value;
            if(value > 1) minus.classList.remove('minus');
            update(input, value);
        });


        minus.addEventListener('click', () =>{
            let value = parseiInt(input.value);
            if(value > 1){
                input.value = --value;
                if(value === 1) minus.classList.add('minus');
                updateCart(input, value);
            }
        });


    });
