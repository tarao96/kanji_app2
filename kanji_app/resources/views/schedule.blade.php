<x-layout title="Kanji | 日程入力">
<div class="main bg-sub-main d-flex justify-content-center py-5">
    <div class="card border border-dark shadow p-5" style="width: 50%;">
        <div class="card-body">
            <h1 class="title fs-3 fw-bold">参加できる日程を入力しよう</h1>
            <form action="{{ route('attendance.create') }}" method="POST" class="mt-5">
                @csrf
                <div class="form-group">
                    <label for="name" class="fs-5 fw-bold">名前</label>
                    <input
                        type="text"
                        id="name"
                        placeholder="例）田中太郎"
                        class="input-text form-control">
                </div>
                <div class="form-group mt-5">
                    <label for="schedule" class="fs-4 fw-bold">日程</label>
                    <div class="form-wrapper d-flex flex-column mt-4 ml-3 gap-4">
                        @foreach ($dates as $date)
                        <div class="d-flex align-items-center">
                            <span class="fs-5">{{ $date->date }}</span>
                            <div class="date-select d-flex align-items-center" style="margin-left: 30px;">
                                <label
                                    for="attend_status"
                                    class="
                                        fs-3
                                        d-flex
                                        justify-content-center
                                        align-items-center
                                        shadow
                                        border
                                        border-dark
                                        rounded-circle"
                                    style="
                                        width: 60px;
                                        height: 60px;
                                        margin-left: 30px;
                                        cursor: pointer"
                                    data-date-id="{{ $date->id }}"
                                    data-value="1">◯</label>
                                <label
                                    for="attend_status"
                                    class="
                                        fs-3
                                        d-flex
                                        justify-content-center
                                        align-items-center
                                        shadow
                                        border
                                        border-dark
                                        rounded-circle"
                                    style="
                                        width: 60px;
                                        height: 60px;
                                        margin-left: 30px;
                                        cursor: pointer;"
                                    data-date-id="{{ $date->id }}"
                                    data-value="2">△</label>
                                <label
                                    for="attend_status"
                                    class="
                                        selected
                                        fs-3
                                        d-flex
                                        justify-content-center
                                        align-items-center
                                        shadow
                                        border
                                        border-dark
                                        rounded-circle"
                                    style="
                                        width: 60px;
                                        height: 60px;
                                        margin-left: 30px;
                                        cursor: pointer;"
                                    data-date-id="{{ $date->id }}"
                                    data-value="3">×</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group mt-5">
                    <label for="comment" class="fs-5 fw-bold">コメント</label>
                    <input
                        type="text"
                        id="comment"
                        name="comment"
                        placeholder="例）楽しみすぎます...！"
                        class="input-text form-control" style="width: 500px;">
                </div>
                <button
                    type="submit"
                    class="
                        bg-main
                        text-white
                        shadow
                        rounded
                        px-3
                        py-2
                        mt-5
                        mx-auto">決定する</button>
            </form>
        </div>
    </div>
</div>
</x-layout>
@vite('resources/js/date.ts')
