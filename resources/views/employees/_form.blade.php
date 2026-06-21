<div class="mb-3">
    <label class="form-label">First Name</label>
    <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name ?? '') }}"
           class="form-control @error('first_name') is-invalid @enderror">
    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Last Name</label>
    <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name ?? '') }}"
           class="form-control @error('last_name') is-invalid @enderror">
    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Gender</label>
    @php $genderValue = old('gender', $employee->gender ?? ''); @endphp
    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
        <option value="">-- Select --</option>
        <option value="Male" @selected($genderValue === 'Male')>Male</option>
        <option value="Female" @selected($genderValue === 'Female')>Female</option>
    </select>
    @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Birthday</label>
    <input type="date" name="birthday"
           value="{{ old('birthday', isset($employee) ? $employee->birthday->format('Y-m-d') : '') }}"
           class="form-control @error('birthday') is-invalid @enderror">
    @error('birthday') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Monthly Salary</label>
    <input type="number" step="0.01" min="0" name="monthly_salary"
           value="{{ old('monthly_salary', $employee->monthly_salary ?? '') }}"
           class="form-control @error('monthly_salary') is-invalid @enderror">
    @error('monthly_salary') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
