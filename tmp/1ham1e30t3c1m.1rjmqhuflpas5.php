<div class="wrapper-page">

    <h4>PHP Exercise - v21.0.5</h4>
    <form id="stockForm" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="symbol" class="form-label">Company Symbol</label>
            <select class="form-select" id="symbol" name="symbol" required></select>
            <div class="invalid-feedback">Please select a Company Symbol.</div>
        </div>
        <div class="mb-3">
            <label for="startDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="startDate" name="startDate" required>
            <div class="invalid-feedback">Please enter a valid Start Date.</div>
        </div>
        <div class="mb-3">
            <label for="endDate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="endDate" name="endDate" required>
            <div class="invalid-feedback">Please enter a valid End Date.</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>

        <button type="submit" class="btn btn-primary">Get Historical Data</button>
    </form>
</div>