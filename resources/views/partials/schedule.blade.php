<section class="schedule-section">
    <div class="container">
        <div class="header">
            <h1 style="font-weight: bold">Vanguard Schedule</h1>
            <p>Jadwal mata kuliah Vanguard</p>
        </div>

        <div class="schedule-controls">
            <input type="text" class="search-box" id="searchBox" placeholder="Search courses...">
            <div class="filter-group">
                <button class="filter-btn active" data-filter="All">All</button>
                <button class="filter-btn" data-filter="Senin">Senin</button>
                <button class="filter-btn" data-filter="Selasa">Selasa</button>
                <button class="filter-btn" data-filter="Rabu">Rabu</button>
                <button class="filter-btn" data-filter="Kamis">Kamis</button>
                <button class="filter-btn" data-filter="Jumat">Jumat</button>
            </div>
        </div>

        <div class="schedule-grid" id="scheduleGrid">
            <!-- Schedule cards will be populated here -->
        </div>

        <div class="no-results" id="noResults" style="display: none;">
            No schedules found matching your criteria.
        </div>
    </div>
</section>

<script>
    const schedules = @json($schedules ?? []);

    let currentClassFilter = 'All';
    let currentDayFilter = 'All';
    let currentSearch = '';

    function displaySchedule() {
        const filtered = schedules.filter(s => {
            const haystack = `${s.course} ${s.day} ${s.time} ${s.room} ${s.class}`.toLowerCase();
            const matchesSearch = currentSearch === '' || haystack.includes(currentSearch.toLowerCase());
            const matchesDay = currentDayFilter === 'All' || s.day === currentDayFilter;
            return matchesDay && matchesSearch;
        });

        const grid = document.getElementById('scheduleGrid');
        const noResults = document.getElementById('noResults');

        if (filtered.length === 0) {
            grid.innerHTML = '';
            noResults.style.display = 'block';
        } else {
            noResults.style.display = 'none';
            grid.innerHTML = filtered.map(s => `
                <div class="lecture-card">
                    <div class="lecture-header">
                        <div class="course-name">${s.course}</div>
                        <span class="class-tag">${s.class}</span>
                    </div>
                    <div class="lecture-info">
                        <div class="info-row">
                            <span class="info-label">Day:</span>
                            <span class="day-badge">${s.day}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Time:</span>
                            <span>${s.time}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Room:</span>
                            <span>${s.room}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Credits:</span>
                            <span class="credits-badge">${s.credits}</span>
                        </div>
                    </div>
                </div>
            `).join('');
        }
    }

    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentDayFilter = this.dataset.filter;
            displaySchedule();
        });
    });

    document.getElementById('searchBox').addEventListener('input', function(e) {
        currentSearch = e.target.value;
        displaySchedule();
    });

    displaySchedule();
</script>
