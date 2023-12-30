<x-layout title="Kanji | ホーム">
    <div class="main bg-sub-main d-flex justify-content-center py-5">
        <div class="card shadow border-dark p-5">
            <div class="car-body">
                <div class="card-body-wrapper d-flex flex-column align-items-center">
                    <h1 class="title fs-3 font-main-color">無料で使えるイベント管理ツール</h1>
                    <img
                        src="{{ asset('/images/main.svg') }}"
                        alt="メイン画像"
                        class="main-img mt-2">
                    <form action="{{ route('event.create') }}" method="POST" class="form d-flex flex-column align-items-center mt-4">
                        @csrf
                        <div class="input-box d-flex gap-5">
                            <div class="input-box-left">
                                <div class="form-group">
                                    <label for="event-name" class="fw-bold fs-5">イベント名</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        placeholder="例）忘年会"
                                        value=""
                                        class="input-text form-control">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="description" class="fw-bold fs-5">イベント詳細</label>
                                    <textarea
                                        name="description"
                                        id="description"
                                        placeholder="例）今年もお疲れ様でした！&#13;今年も忘年会やります！&#13;今年あった嫌なこと全部忘れよう！"
                                        class="input-textarea form-control"
                                        rows="10"></textarea>
                                </div>
                            </div><!-- input-box-left -->
                            <div class="input-box-right">
                                <div class="form-group">
                                    <label for="date" class="fw-bold fs-5">候補日時</label>
                                    <textarea
                                        name="date"
                                        id="date"
                                        placeholder="例）12/9(土) 19:00-&#13;12/10（日）19:00-&#13;※候補日時の区切りは改行で判断されます"
                                        class="form-control"
                                        cols="50"
                                        rows="10"></textarea>
                                </div>
                            </div><!-- input-box-right -->
                        </div>
                        <button type="submit" class="bg-main font-white mx-auto rounded px-5 py-2 mt-5">今すぐイベントを作成する</button>
                    </form><!-- form -->
                </div>
                <a href="/service" class="service-link">使い方はこちら</a>
            </div>
        </div>
    </div>
</x-layout>
