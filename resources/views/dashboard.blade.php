<x-app-layout>

<div style="display:flex; height:calc(100vh - 64px); background:#f0f4f0; font-family:'Inter',sans-serif; overflow:hidden;">

    <div style="width:260px; background:#fff; border-right:1px solid #e5eae6; display:flex; flex-direction:column; flex-shrink:0;">

        <div style="padding:20px 16px 14px; border-bottom:1px solid #e5eae6;">
            <p style="font-size:10px; font-weight:600; letter-spacing:0.12em; color:#9aab9e; text-transform:uppercase; margin:0 0 4px;">Ruang Diskusi</p>
            <h2 style="font-size:15px; font-weight:600; color:#1a2e1e; margin:0;">Saluran</h2>
        </div>

        <div style="flex:1; overflow-y:auto; padding:10px 8px; display:flex; flex-direction:column; gap:2px;">
            @foreach($channels as $chan)
                @php $isActive = isset($activeChannel) && $activeChannel->id == $chan->id; @endphp
                @if($isActive)
                    <a href="{{ route('chat.room', $chan->id) }}"
                       style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; text-decoration:none; font-size:13.5px; font-weight:600; color:#1a7a42; background:#e6f4ec;">
                        <span style="width:7px; height:7px; border-radius:50%; background:#1a7a42; flex-shrink:0;"></span>
                        <span style="flex:1; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $chan->nama_channel }}</span>
                    </a>
                @else
                    <a href="{{ route('chat.room', $chan->id) }}"
                       style="display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; text-decoration:none; font-size:13.5px; font-weight:400; color:#4a5e50; background:transparent;">
                        <span style="width:7px; height:7px; border-radius:50%; background:#c0cdc3; flex-shrink:0;"></span>
                        <span style="flex:1; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $chan->nama_channel }}</span>
                    </a>
                @endif
            @endforeach
        </div>

        <div style="padding:14px 16px; border-top:1px solid #e5eae6; display:flex; align-items:center; gap:10px;">
            <div style="width:36px; height:36px; border-radius:50%; background:#e6f4ec; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#1a7a42; flex-shrink:0;">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <p style="font-size:13px; font-weight:600; color:#1a2e1e; margin:0;">{{ auth()->user()->name }}</p>
                <p style="font-size:10px; color:#1a7a42; font-weight:600; letter-spacing:0.05em; text-transform:uppercase; margin:0;">
                    @if(auth()->user()->is_admin == 1) Administrator @else Petani Aktif @endif
                </p>
            </div>
        </div>

    </div>

    <div style="flex:1; display:flex; flex-direction:column; background:#fff; min-width:0; overflow:hidden;">

        @if(isset($activeChannel))
        <div style="height:64px; padding:0 24px; border-bottom:1px solid #e5eae6; display:flex; align-items:center; justify-content:space-between; flex-shrink:0; background:#fff;">
            <div>
                <h3 style="font-size:15px; font-weight:600; color:#1a2e1e; margin:0;">{{ $activeChannel->nama_channel }}</h3>
                <p style="font-size:12px; color:#9aab9e; margin:2px 0 0;">Wilayah: {{ $activeChannel->kecamatan->nama_kecamatan ?? 'Umum' }}</p>
            </div>
            <div style="display:flex; align-items:center; gap:6px; background:#e6f4ec; color:#1a7a42; font-size:11px; font-weight:600; padding:5px 12px; border-radius:20px;">
                <span style="width:6px; height:6px; border-radius:50%; background:#1a7a42;"></span>
                Aktif
            </div>
        </div>
        @endif

        <div id="chatMessages" style="flex:1; overflow-y:auto; padding:24px; display:flex; flex-direction:column; gap:16px; background:#f8faf8;">

            @if(isset($messages) && $messages->count() > 0)
                @php $lastDate = null; @endphp
                @foreach($messages as $msg)
                    @php
                        $msgDate = $msg->created_at->format('Y-m-d');
                        $isOwn   = $msg->user_id == auth()->id();
                    @endphp

                    @if($msgDate !== $lastDate)
                        @php $lastDate = $msgDate; @endphp
                        <div style="display:flex; align-items:center; gap:12px; margin:4px 0;">
                            <div style="flex:1; height:1px; background:#e5eae6;"></div>
                            <span style="font-size:11px; color:#9aab9e; white-space:nowrap;">
                                {{ $msg->created_at->isToday() ? 'Hari ini' : $msg->created_at->translatedFormat('d F Y') }}
                            </span>
                            <div style="flex:1; height:1px; background:#e5eae6;"></div>
                        </div>
                    @endif

                    @if($isOwn)
                    <div style="display:flex; gap:10px; align-items:flex-end; flex-direction:row-reverse;">
                        <div style="width:28px; height:28px; border-radius:50%; background:#e6f4ec; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:600; color:#1a7a42; flex-shrink:0;">
                            {{ strtoupper(substr($msg->user->name, 0, 1)) }}
                        </div>
                        <div style="display:flex; flex-direction:column; align-items:flex-end; gap:4px; max-width:65%;">
                            <div style="padding:10px 14px; font-size:13.5px; line-height:1.55; word-break:break-word; background:#2d7a4f; color:#fff; border-radius:16px 16px 4px 16px;">
                                {{ $msg->pesan }}
                            </div>
                            <span style="font-size:10px; color:#9aab9e; padding:0 2px;">{{ $msg->created_at->format('H:i') }}</span>
                        </div>
                    </div>
                    @else
                    <div style="display:flex; gap:10px; align-items:flex-end;">
                        <div style="width:28px; height:28px; border-radius:50%; background:#f0f4f0; border:1px solid #e5eae6; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:600; color:#4a5e50; flex-shrink:0;">
                            {{ strtoupper(substr($msg->user->name, 0, 1)) }}
                        </div>
                        <div style="display:flex; flex-direction:column; align-items:flex-start; gap:4px; max-width:65%;">
                            <span style="font-size:11px; color:#9aab9e; padding-left:2px;">{{ $msg->user->name }}</span>
                            <div style="padding:10px 14px; font-size:13.5px; line-height:1.55; word-break:break-word; background:#fff; color:#1a2e1e; border:1px solid #e5eae6; border-radius:16px 16px 16px 4px;">
                                {{ $msg->pesan }}
                            </div>
                            <span style="font-size:10px; color:#9aab9e; padding:0 2px;">{{ $msg->created_at->format('H:i') }}</span>
                        </div>
                    </div>
                    @endif

                @endforeach
            @else
                <div style="flex:1; display:flex; flex-direction:column; align-items:center; justify-content:center; color:#b0bdb4; gap:10px; text-align:center;">
                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    <p style="font-size:14px; color:#9aab9e; margin:0;">Belum ada pesan. Mulai diskusi!</p>
                </div>
            @endif

        </div>

        @if(isset($activeChannel))
        <div style="padding:12px 24px; border-top:1px solid #e5eae6; background:#fff; flex-shrink:0;">
            <form method="POST" action="{{ route('chat.send', $activeChannel->id) }}"
                  enctype="multipart/form-data"
                  style="display:flex; align-items:center; gap:10px; background:#f8faf8; border:1px solid #d4e2d8; border-radius:28px; padding:8px 8px 8px 20px;">
                @csrf
                <input type="text" name="pesan" required autocomplete="off"
                       placeholder="Tulis pesan diskusi..."
                       style="flex:1; border:none; background:transparent; font-size:14px; color:#1a2e1e; outline:none; padding:4px 0;">
                <button type="submit"
                        style="display:flex; align-items:center; gap:7px; background:#2d7a4f; color:#fff; border:none; border-radius:22px; padding:10px 22px; font-size:13.5px; font-weight:600; cursor:pointer; white-space:nowrap; flex-shrink:0;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                    </svg>
                    Kirim
                </button>
            </form>
        </div>
        @endif

    </div>

</div>

<script>
    const chat = document.getElementById('chatMessages');
    if (chat) chat.scrollTop = chat.scrollHeight;
</script>

</x-app-layout>