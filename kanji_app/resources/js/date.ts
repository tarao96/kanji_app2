// ラベルの選択状態切り替え
document.addEventListener('DOMContentLoaded', function () {
    const dateGroups = document.querySelectorAll('.date-select');

    dateGroups.forEach((group) => {
        const labels = group.querySelectorAll('label');

        labels.forEach((label) => {
            label.addEventListener('click', function () {
                // 他のラベルからselectedクラスを削除
                labels.forEach((otherLabel) => {
                    if (otherLabel !== label) {
                        otherLabel.classList.remove('selected');
                    }
                });

                // 選択されたラベルにselectedクラスを追加
                label.classList.add('selected');
            });
        });
    });
});

// APIで日程データを保存
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // 選択されたラベルを取得
            const selectedLabels = document.querySelectorAll('.date-select label.selected');

            if (!selectedLabels) {
                alert('日程を選択してください');
                return;
            }

            type SelectedDate = {
                dateId: number,
                attendStatus: number,
            }

            const selectedDates: Array<SelectedDate> = [];

            selectedLabels.forEach((selectedLabel) => {
                const dateId: number = selectedLabel.dataset.dateId;
                const attendStatus: number = selectedLabel.dataset.value;

                selectedDates.push({
                    dateId: dateId,
                    attendStatus: attendStatus,
                });
            });

            // APIに送信
            sendDataToServer(selectedDates);
        })
    }
});

function sendDataToServer(selectedDates) {
    // 名前を取得
    const name = document.getElementById('name');
    const nameValue = name ? name.value : '';

    // コメントを取得
    const comment = document.getElementById('comment');
    const commentValue = comment ? comment.value : '';

    fetch('/api/attend', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            name: nameValue,
            comment: commentValue,
            selected_dates: selectedDates,
        }),
        credentials: 'same-origin'
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error();
        }
    })
    .then(data => {
        console.log(data);
        window.location.href = '/';
    })
    .catch(error => {
        console.log(error);
    });
}
