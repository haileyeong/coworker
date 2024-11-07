// function checkedEmail() {
//     let email = document.getElementById('email').value;
//     let emailStatus = document.getElementById('emailStatus');
//
//     fetch('/check-email', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': '{{ csrf_token() }}'
//         },
//         body: JSON.stringify({email: email})
//     })
//         .then(response => response.json())
//         .then(data => {
//             emailStatus.classList.remove('text-gray-500', 'text-red-500', 'text-green-500');
//
//             if (data.exists) {
//                 emailStatus.textContent = '이미 사용 중인 이메일입니다';
//                 emailStatus.classList.add('text-red-500');
//             } else {
//                 emailStatus.textContent = '사용할 수 있는 이메일입니다';
//                 emailStatus.classList.add('text-green-500');
//             }
//         })
//         .catch(error => console.error('Error:', error));
// }

function checkedEmail() {
    let email = document.getElementById('email').value;
    let emailStatus = document.getElementById('emailStatus');

    // 이메일이 비어있지 않으면 검사
    if (email) {
        fetch('/check-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({email: email})
        })
            .then(response => response.json())
            .then(data => {
                // 메시지 및 스타일 초기화
                emailStatus.classList.remove('text-gray-500', 'text-red-500', 'text-green-500');

                if (data.exists) {
                    // 이메일이 중복일 경우
                    emailStatus.textContent = '이미 사용 중인 이메일입니다.';
                    emailStatus.classList.add('text-red-500');
                } else {
                    // 이메일이 사용 가능할 경우
                    emailStatus.textContent = '사용할 수 있는 이메일입니다.';
                    emailStatus.classList.add('text-green-500');
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        // 이메일이 비어있을 경우 메시지
        emailStatus.textContent = '이메일을 입력해 주세요.';
        emailStatus.classList.remove('text-red-500', 'text-green-500');
        emailStatus.classList.add('text-gray-500');
    }
}
