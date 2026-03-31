<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CV Generator :: v2.4.1</title>
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg: #0d0f0e;
      --surface: #111412;
      --surface2: #161a18;
      --border: #1f2b26;
      --border-mid: #274035;
      --border-accent: #0F6E56;
      --ink: #d4e8e0;
      --ink-mid: #8ab5a4;
      --ink-dim: #4a6b5e;
      --teal: #1D9E75;
      --teal-light: #E1F5EE;
      --teal-dark: #085041;
      --danger: #E24B4A;
    }

    body {
      font-family: 'Rajdhani', sans-serif;
      background: var(--bg);
      color: var(--ink);
      min-height: 100vh;
      padding: 0 0 80px;
    }

    .topbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 48px;
      height: 52px;
      background: var(--surface);
      border-bottom: 1px solid var(--border-accent);
    }

    .logo {
      font-family: 'Share Tech Mono', monospace;
      font-size: 13px;
      color: var(--teal);
      letter-spacing: 0.12em;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo-dot {
      width: 7px; height: 7px;
      background: var(--teal);
      border-radius: 50%;
      animation: blink 1.4s infinite;
    }

    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.2} }

    .tagline {
      font-family: 'Share Tech Mono', monospace;
      font-size: 10px;
      color: var(--ink-dim);
      letter-spacing: 0.18em;
      text-transform: uppercase;
    }

    .page {
      max-width: 760px;
      margin: 0 auto;
      padding: 48px 20px;
    }

    .form-card {
      border: 1px solid var(--border-mid);
      background: var(--surface);
      overflow: hidden;
    }

    .form-card-header {
      padding: 14px 28px;
      background: var(--surface2);
      border-bottom: 1px solid var(--border-mid);
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .card-title {
      font-family: 'Share Tech Mono', monospace;
      font-size: 13px;
      color: var(--teal);
      letter-spacing: 0.1em;
      white-space: nowrap;
    }

    .header-rule {
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    .header-meta {
      font-family: 'Share Tech Mono', monospace;
      font-size: 10px;
      color: var(--ink-dim);
      letter-spacing: 0.12em;
      white-space: nowrap;
    }

    .form-body { padding: 28px 32px 32px; }

    .section-label {
      display: flex;
      align-items: center;
      gap: 10px;
      font-family: 'Share Tech Mono', monospace;
      font-size: 10px;
      letter-spacing: 0.22em;
      text-transform: uppercase;
      color: var(--teal);
      margin-bottom: 18px;
      margin-top: 32px;
    }

    .section-label:first-of-type { margin-top: 0; }

    .section-label::before {
      content: '';
      display: inline-block;
      width: 3px; height: 13px;
      background: var(--teal);
      border-radius: 1px;
      flex-shrink: 0;
    }

    .section-label::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    .grid-3 {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
    }

    .grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-bottom: 16px;
    }

    .field:last-child { margin-bottom: 0; }

    label {
      font-family: 'Share Tech Mono', monospace;
      font-size: 10px;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--ink-mid);
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      font-family: 'Rajdhani', sans-serif;
      font-size: 15px;
      font-weight: 400;
      color: var(--ink);
      background: var(--surface2);
      border: 1px solid var(--border-mid);
      border-left: 2px solid var(--border-accent);
      border-radius: 0;
      padding: 9px 12px;
      outline: none;
      resize: vertical;
      transition: border-color 0.15s, background 0.15s;
    }

    input::placeholder, textarea::placeholder {
      color: var(--ink-dim);
      font-weight: 300;
    }

    input:focus, textarea:focus {
      border-color: var(--teal);
      border-left: 2px solid var(--teal);
      background: var(--surface);
    }

    textarea { min-height: 82px; line-height: 1.6; }

    .file-upload {
      border: 1px dashed var(--border-mid);
      border-left: 2px solid var(--border-accent);
      padding: 22px;
      text-align: center;
      cursor: pointer;
      background: var(--surface2);
      position: relative;
      transition: border-color 0.15s, background 0.15s;
    }

    .file-upload:hover {
      border-color: var(--teal);
      background: var(--surface);
    }

    .file-upload input[type="file"] {
      position: absolute; inset: 0; opacity: 0;
      cursor: pointer; width: 100%; height: 100%;
    }

    .file-upload-icon {
      font-family: 'Share Tech Mono', monospace;
      font-size: 18px;
      color: var(--teal);
      margin-bottom: 6px;
    }

    .file-upload-text {
      font-size: 12px;
      color: var(--ink-mid);
      letter-spacing: 0.04em;
    }

    .file-upload-text strong { color: var(--teal); font-weight: 500; }

    .exp-entries { display: flex; flex-direction: column; gap: 8px; }

    .exp-entry {
      border: 1px solid var(--border-mid);
      border-left: 2px solid var(--border-accent);
      background: var(--surface);
      overflow: hidden;
    }

    .exp-entry-head {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 9px 14px;
      background: var(--surface2);
      border-bottom: 1px solid var(--border);
      cursor: pointer;
      user-select: none;
    }

    .exp-entry-num {
      font-family: 'Share Tech Mono', monospace;
      font-size: 10px;
      letter-spacing: 0.14em;
      color: var(--teal);
      white-space: nowrap;
    }

    .exp-entry-preview {
      font-family: 'Share Tech Mono', monospace;
      font-size: 12px;
      color: var(--ink-mid);
      flex: 1;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .exp-remove {
      font-size: 16px;
      line-height: 1;
      color: var(--ink-dim);
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
      transition: color 0.15s;
      flex-shrink: 0;
      font-family: 'Share Tech Mono', monospace;
    }

    .exp-remove:hover { color: var(--danger); }

    .exp-entry-body { padding: 16px; }

    .add-btn {
      display: flex;
      align-items: center;
      gap: 8px;
      font-family: 'Share Tech Mono', monospace;
      font-size: 11px;
      letter-spacing: 0.16em;
      text-transform: uppercase;
      color: var(--teal);
      background: none;
      border: 1px dashed var(--border-mid);
      border-left: 2px solid var(--border-accent);
      width: 100%;
      padding: 10px 14px;
      cursor: pointer;
      transition: border-color 0.15s, background 0.15s;
      margin-top: 6px;
    }

    .add-btn:hover {
      border-color: var(--teal);
      background: var(--surface2);
    }

    .submit-wrap {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 32px;
      padding-top: 24px;
      border-top: 1px solid var(--border);
    }

    .hint {
      font-family: 'Share Tech Mono', monospace;
      font-size: 10px;
      color: var(--ink-dim);
      letter-spacing: 0.1em;
    }

    .submit-btn {
      font-family: 'Share Tech Mono', monospace;
      font-size: 11px;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--teal-light);
      background: var(--teal-dark);
      border: 1px solid var(--teal);
      padding: 12px 32px;
      cursor: pointer;
      transition: background 0.15s;
    }

    .submit-btn:hover { background: var(--teal); }
    .submit-btn:active { transform: scale(0.98); }

    @media (max-width: 560px) {
      .topbar { padding: 0 20px; }
      .form-body { padding: 20px; }
      .grid-3, .grid-2 { grid-template-columns: 1fr; }
      .submit-wrap { flex-direction: column; gap: 16px; align-items: flex-start; }
    }
  </style>
</head>
<body>

<nav class="topbar">
  <div class="logo">
    <div class="logo-dot"></div>
    CV_GENERATOR : v2.4.1
  </div>
  <div class="tagline">Professional Record System</div>
</nav>

<div class="page">
  <div class="form-card">

    <div class="form-card-header">
      <div class="card-title">// NEW_RESUME.INIT</div>
      <div class="header-rule"></div>
      <div class="header-meta">MODULE 01 / 01</div>
    </div>

    <div class="form-body">
      <form action="controller/CVController.php" method="POST" enctype="multipart/form-data">

        <div class="section-label">Identity Parameters</div>

        <div class="grid-3">
          <div class="field" style="margin-bottom:0">
            <label for="name">Full Name *</label>
            <input type="text" id="name" name="name" placeholder="Jenny Bebanco" required>
          </div>
          <div class="field" style="margin-bottom:0">
            <label for="jobtitle">Designation</label>
            <input type="text" id="jobtitle" name="jobtitle" placeholder="Game Developer">
          </div>
          <div class="field" style="margin-bottom:0">
            <label for="location">Sector / Location</label>
            <input type="text" id="location" name="location" placeholder="Ormoc, Philippines">
          </div>
        </div>

        <div class="grid-2">
          <div class="field" style="margin-bottom:0">
            <label for="email">Comm Channel — Email *</label>
            <input type="email" id="email" name="email" placeholder="1234567@email.com" required>
          </div>
          <div class="field" style="margin-bottom:0">
            <label for="phone">Comm Channel — Phone *</label>
            <input type="text" id="phone" name="phone" placeholder="+63 9XX XXX XXXX" required>
          </div>
        </div>

        <div class="section-label">Operational History</div>

        <div class="exp-entries" id="exp-entries"></div>
        <button type="button" class="add-btn" id="add-exp">+ APPEND_ENTRY</button>

        <div class="section-label">Academic Record</div>
        <div class="field">
          <label for="education">Educational Background</label>
          <textarea id="education" name="education" placeholder="BS Information Technology&#10;University of the Philippines, 20XX–20XX"></textarea>
        </div>

        <div class="section-label">Capability Matrix</div>
        <div class="field">
          <label for="skills">Skills — comma delimited</label>
          <input type="text" id="skills" name="skills" placeholder="PHP, MySQL, React, Docker, Git">
        </div>

        <div class="section-label">Biometric Image</div>
        <div class="file-upload">
          <input type="file" name="photo" id="photo" accept="image/*">
          <div class="file-upload-icon">[+]</div>
          <div class="file-upload-text"><strong>Click to upload</strong> or drag photo here</div>
        </div>

        <div class="submit-wrap">
          <span class="hint">* Required fields &nbsp;|&nbsp; All data encrypted in transit</span>
          <button type="submit" class="submit-btn">COMPILE_RESUME &#8594;</button>
        </div>

      </form>
    </div>

  </div>
</div>

<script>
  let expCount = 0;

  function addExperience() {
    expCount++;
    const idx = expCount;
    const container = document.getElementById('exp-entries');
    const entry = document.createElement('div');
    entry.className = 'exp-entry';
    entry.dataset.idx = idx;
    entry.innerHTML = `
      <div class="exp-entry-head" onclick="toggleEntry(this)">
        <span class="exp-entry-num">NODE_${String(idx).padStart(2,'0')}</span>
        <span class="exp-entry-preview" id="exp-preview-${idx}">—</span>
        <button type="button" class="exp-remove" onclick="removeEntry(event,${idx})">×</button>
      </div>
      <div class="exp-entry-body">
        <div class="grid-2">
          <div class="field" style="margin-bottom:0">
            <label>Job Title</label>
            <input type="text" name="exp_title[]" placeholder="Senior Developer"
              oninput="updateExpPreview(${idx})">
          </div>
          <div class="field" style="margin-bottom:0">
            <label>Organisation</label>
            <input type="text" name="exp_company[]" placeholder="Acme Corporation"
              oninput="updateExpPreview(${idx})">
          </div>
        </div>
        <div class="grid-2" style="margin-top:14px">
          <div class="field" style="margin-bottom:0">
            <label>Start Date</label>
            <input type="text" name="exp_start[]" placeholder="January 2022">
          </div>
          <div class="field" style="margin-bottom:0">
            <label>End Date</label>
            <input type="text" name="exp_end[]" placeholder="Present">
          </div>
        </div>
        <div class="field" style="margin-top:14px;margin-bottom:0">
          <label>Role Description</label>
          <textarea name="exp_desc[]" placeholder="Key responsibilities and achievements..."></textarea>
        </div>
      </div>
    `;
    container.appendChild(entry);
  }

  function updateExpPreview(idx) {
    const entry = document.querySelector(`.exp-entry[data-idx="${idx}"]`);
    if (!entry) return;
    const title   = entry.querySelector('[name="exp_title[]"]').value.trim();
    const company = entry.querySelector('[name="exp_company[]"]').value.trim();
    const el = document.getElementById(`exp-preview-${idx}`);
    if (el) el.textContent = [title, company].filter(Boolean).join(' @ ') || '—';
  }

  function toggleEntry(head) {
    const body = head.nextElementSibling;
    body.style.display = body.style.display === 'none' ? '' : 'none';
  }

  function removeEntry(e, idx) {
    e.stopPropagation();
    document.querySelector(`.exp-entry[data-idx="${idx}"]`)?.remove();
  }

  document.getElementById('add-exp').addEventListener('click', addExperience);
  addExperience();
</script>

</body>
</html>