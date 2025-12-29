<section id="notes" class="quotes-section">
    <div class="container">
        <div class="header">
            <h1 style="font-weight: bold">Vanguard Community</h1>
            <p>Anonymous Notes</p>
        </div>

        <!-- New two-column layout -->
        <div class="main-grid">
            <!-- Note form section -->
            <div class="message-section">
                <h3 class="section-title">Share Your Note</h3>
                <p style="font-size: 13px; color: rgba(40, 49, 77, 0.6); margin-bottom: 16px;">Your note will be posted anonymously</p>
                <form id="noteForm" method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <textarea name="note" placeholder="Write your anonymous note here..." required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit;"></textarea>
                    <button type="submit" class="btn" style="width: 100%; margin-top: 10px;">Send Note</button>
                </form>
            </div>

            <!-- Notes wall -->
            <div>
                <h3 class="section-title">Community Notes</h3>
                <div class="messages-wall" id="notesWall">
                    @forelse($notes ?? [] as $note)
                    <div class="message-card">
                        <div class="message-text">{{ $note->note }}</div>
                        <div class="message-time">{{ $note->created_at->diffForHumans() }}</div>
                    </div>
                    @empty
                    <div class="empty-state" style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
                        <p>No notes yet. Be the first to share!</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
