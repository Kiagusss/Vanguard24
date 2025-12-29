<section class="birthday-section">
    <div class="calendar-header">
        <h2 class="section-title">Birthday Reminders</h2>
        <div class="birthday-search">
            <input type="text" id="birthdaySearch" placeholder="Search by name...">
        </div>
        <div class="calendar-nav">
            <button class="calendar-nav-btn" id="prevMonth">← Previous</button>
            <div class="calendar-month-year">
                <span class="calendar-month" id="monthDisplay">December</span>
                <span class="calendar-year" id="yearDisplay">2025</span>
            </div>
            <button class="calendar-nav-btn" id="nextMonth">Next →</button>
        </div>
    </div>

    <div class="calendar-grid" id="calendarGrid">
        <!-- Calendar will be populated here -->
    </div>

    <div class="birthday-list">
        <h3 class="birthday-list-title" id="birthdayListTitle">Birthdays This Month</h3>
        <div class="birthday-grid" id="birthdayGrid">
            <!-- Birthday cards will be populated here -->
        </div>
    </div>
</section>

<!-- Birthday modal -->
<div class="modal" id="birthdayModal">
    <div class="modal-content">
        <div class="modal-icon">🎉</div>
        <h2 class="modal-title" id="modalTitle">Happy Birthday!</h2>
        <p class="modal-text" id="modalText">It's someone's special day today!</p>
        <div class="modal-buttons">
            <button class="modal-btn modal-btn-primary" id="sendWishBtn">Send Wish</button>
            <button class="modal-btn modal-btn-secondary" onclick="closeModal()">Close</button>
        </div>
    </div>
</div>

<script>
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'];

    // Birthdays data from backend (with next_occurrence computed server-side)
    const birthdays = @json($birthdays ?? []);

    const today = new Date();
    let currentCalendarMonth = today.getMonth();
    let currentCalendarYear = today.getFullYear();

    function changeMonth(direction) {
        currentCalendarMonth += direction;
        if (currentCalendarMonth > 11) {
            currentCalendarMonth = 0;
            currentCalendarYear++;
        } else if (currentCalendarMonth < 0) {
            currentCalendarMonth = 11;
            currentCalendarYear--;
        }
        renderCalendar();
        renderBirthdayList();
    }

    function renderCalendar() {
        const firstDay = new Date(currentCalendarYear, currentCalendarMonth, 1).getDay();
        const daysInMonth = new Date(currentCalendarYear, currentCalendarMonth + 1, 0).getDate();
        const today = new Date();
        
        document.getElementById('monthDisplay').textContent = monthNames[currentCalendarMonth];
        document.getElementById('yearDisplay').textContent = currentCalendarYear;

        const dayHeaders = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        let html = dayHeaders.map(day => `<div class="calendar-day-header">${day}</div>`).join('');

        for (let i = 0; i < firstDay; i++) {
            html += '<div class="calendar-day empty"></div>';
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dateStr = `${currentCalendarYear}-${String(currentCalendarMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const hasBirthday = birthdays.some(b => b.next_occurrence === dateStr);
            const isToday = today.getFullYear() === currentCalendarYear && 
                           today.getMonth() === currentCalendarMonth && 
                           today.getDate() === day;

            let className = 'calendar-day';
            if (hasBirthday) className += ' has-birthday';
            if (isToday) className += ' today';

            const tooltipNames = birthdays
                .filter(b => b.next_occurrence === dateStr)
                .map(b => b.name)
                .join(', ');

            html += `
                <div class="${className}">
                    <div class="calendar-day-number">${day}</div>
                    ${hasBirthday ? '<div class="calendar-birthday-indicator"></div>' : ''}
                    ${tooltipNames ? `<div class="calendar-day-tooltip">${tooltipNames}</div>` : ''}
                </div>
            `;
        }

        document.getElementById('calendarGrid').innerHTML = html;
    }

    function renderBirthdayList(searchTerm = '') {
        const monthBirthdays = birthdays.filter(b => {
            const date = new Date(b.next_occurrence);
            const match = searchTerm === '' || b.name.toLowerCase().includes(searchTerm.toLowerCase());
            return date.getFullYear() === currentCalendarYear && 
                   date.getMonth() === currentCalendarMonth && 
                   match;
        });
        const grid = document.getElementById('birthdayGrid');
        
        if (monthBirthdays.length === 0) {
            grid.innerHTML = '<div class="empty-state" style="grid-column: 1/-1;">No birthdays found.</div>';
            return;
        }

        grid.innerHTML = monthBirthdays.map(person => {
            const date = new Date(person.next_occurrence);
            const isToday = today.getFullYear() === date.getFullYear() && 
                           today.getMonth() === date.getMonth() && 
                           today.getDate() === date.getDate();

            return `
                <div class="birthday-card ${isToday ? 'today' : ''}">
                    <button class="delete-btn">×</button>
                    <div class="birthday-name">${person.name}</div>
                    <div class="birthday-date">${person.display}</div>
                </div>
            `;
        }).join('');
    }

    function closeModal() {
        document.getElementById('birthdayModal').classList.remove('show');
    }

    document.getElementById('prevMonth').addEventListener('click', () => changeMonth(-1));
    document.getElementById('nextMonth').addEventListener('click', () => changeMonth(1));
    document.getElementById('birthdaySearch').addEventListener('input', (e) => {
        renderBirthdayList(e.target.value);
    });

    renderCalendar();
    renderBirthdayList();
</script>
