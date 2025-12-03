<x-layoutAdmin>

    <!-- MAIN -->
    <main class="content">

        <!-- 4 CARDS -->
        <div class="stats-row">

            <div class="stat-card">
                <h4>Total Revenue</h4>
                <p class="big">$82,650</p>
                <span class="positive">+11%</span>
            </div>

            <div class="stat-card">
                <h4>Total Order</h4>
                <p class="big">1,645</p>
                <span class="positive">+11%</span>
            </div>

            <div class="stat-card">
                <h4>Customers</h4>
                <p class="big">983</p>
                <span class="positive">+8%</span>
            </div>

            <div class="stat-card">
                <h4>Visitor</h4>
                <p class="big">5,492</p>
                <span class="positive">+19%</span>
            </div>

        </div>

        <!-- Chart -->
        <div class="sales-container">

    <div class="sales-header">
        <h3>Sales Analytic</h3>

        <div class="filter-box">
            <label>Sort by</label>
            <select id="selectMonth">
                <option>Jul 2023</option>
                <option>Aug 2023</option>
                <option>Sep 2023</option>
                <option>Oct 2023</option>
            </select>
        </div>
    </div>

    <!-- BADGE ROW -->
    <div class="sales-info">
        <div class="info-box">
            <p>Income</p>
            <h4>$23,262.00</h4>
            <span class="trend blue">+0.05%</span>
        </div>
        <div class="info-box">
            <p>Expenses</p>
            <h4>$11,135.00</h4>
            <span class="trend orange">+0.03%</span>
        </div>
        <div class="info-box">
            <p>Balance</p>
            <h4>$48,135.00</h4>
            <span class="trend green">+0.08%</span>
        </div>
    </div>

    <!-- CHART -->
    <canvas id="salesChart" height="90"></canvas>

</div>


    </main>

</x-layoutAdmin>