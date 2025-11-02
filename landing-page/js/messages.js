// Load messages when page loads
document.addEventListener('DOMContentLoaded', function() {
    loadMessages();
    setupMessageForm();
});

async function loadMessages() {
    try {
        const response = await fetch('/api/messages');
        const messages = await response.json();
        
        const messagesDisplay = document.querySelector('.messages-display');
        messagesDisplay.innerHTML = ''; // Clear existing messages

        messages.forEach(message => {
            const messageEl = createMessageElement(message);
            messagesDisplay.appendChild(messageEl);
        });
    } catch (error) {
        console.error('Error loading messages:', error);
    }
}

function createMessageElement(message) {
    const div = document.createElement('div');
    div.className = 'message fade-in';
    div.innerHTML = `
        <div class="message-content">
            <h3>${message.name}</h3>
            <p>${message.message}</p>
        </div>
    `;
    return div;
}

function setupMessageForm() {
    const form = document.getElementById('messageForm');
    if (!form) return;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const nameInput = this.querySelector('input[name="name"]');
        const messageInput = this.querySelector('textarea[name="message"]');
        
        try {
            const response = await fetch('/api/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    name: nameInput.value,
                    message: messageInput.value
                })
            });

            const data = await response.json();

            if (response.ok) {
                // Clear form
                nameInput.value = '';
                messageInput.value = '';
                
                // Show success message
                alert('Pesan berhasil dikirim!');
                
                // Reload messages
                loadMessages();
            } else {
                throw new Error(data.message || 'Failed to send message');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Gagal mengirim pesan. Silakan coba lagi.');
        }
    });
}