<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= htmlspecialchars($data['name']) ?> : CV_RECORD</title>

    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        *, *::before, *:after { box-sizing: border-box; margin: 0; padding: 0; }

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
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background: var(--bg);
            color: var(--ink);
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 40px;
            height: 50px;
            background: var(--surface);
            border-bottom: 1px solid var(--border-accent);
        }

        .logo {
            font-family: 'Share Tech Mono', monospace;
            font-size: 12px;
            color: var(--teal);
            letter-spacing: 0.12em;
        }

        .actions a, .actions button {
            font-family: 'Share Tech Mono', monospace;
            font-size: 10px;
            color: var(--ink-mid);
            border: 1px solid var(--border-mid);
            background: none;
            padding: 6px 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .actions button:hover, .actions a:hover {
            color: var(--teal);
            border-color: var(--teal);
        }

        /* PAGE */
        .page {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .resume {
            border: 1px solid var(--border-mid);
            background: var(--surface);
            display: flex;
        }

        /* SIDEBAR */
        .left {
            width: 260px;
            background: var(--surface2);
            padding: 30px;
            border-right: 1px solid var(--border-mid);
        }

        .photo, .initials {
            width: 90px;
            height: 90px;
            margin: 0 auto 20px;
            border-radius: 50%;
            border: 2px solid var(--teal);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Share Tech Mono';
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .name {
            text-align: center;
            font-size: 16px;
            color: var(--teal);
            margin-bottom: 6px;
        }

        .role {
            text-align: center;
            font-size: 11px;
            letter-spacing: 0.2em;
            color: var(--ink-dim);
            margin-bottom: 20px;
        }

        .section-title {
            font-family: 'Share Tech Mono';
            font-size: 10px;
            letter-spacing: 0.2em;
            color: var(--teal);
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 6px;
        }

        .item {
            font-size: 12px;
            color: var(--ink-mid);
            margin-bottom: 6px;
        }

        /* RIGHT */
        .right {
            flex: 1;
            padding: 30px;
        }

        .big-name {
            font-size: 30px;
            color: var(--ink);
            margin-bottom: 6px;
        }

        .sub {
            font-size: 12px;
            color: var(--ink-dim);
            margin-bottom: 20px;
        }

        .block {
            margin-bottom: 20px;
        }

        .exp-title {
            color: var(--teal);
            font-size: 14px;
        }

        .exp-company {
            font-size: 12px;
            color: var(--ink-mid);
        }

        .exp-date {
            font-size: 11px;
            color: var(--ink-dim);
        }

        .exp-desc {
            font-size: 12px;
            margin-top: 6px;
            line-height: 1.6;
        }

        .skills span {
            display: inline-block;
            border: 1px solid var(--border-mid);
            padding: 4px 10px;
            margin: 4px;
            font-size: 11px;
        }

        @media print {
            .topbar { display: none; }
            body { background: white; color: black; }
        }
    </style>
</head>

<body>

<div class="topbar">
    <div class="logo">CV_SYSTEM :: OUTPUT</div>
    <div class="actions">
        <a href="../index.php">← EDIT</a>
        <button onclick="window.print()">EXPORT PDF</button>
    </div>
</div>

<div class="page">
    <div class="resume">

        <!-- LEFT -->
        <div class="left">

            <?php if (!empty($data['photo_web'])): ?>
                <div class="photo">
                    <img src="<?= htmlspecialchars($data['photo_web']) ?>">
                </div>
            <?php else:
                $words = explode(' ', $data['name']);
                $initials = strtoupper(substr($words[0],0,1) . substr(end($words),0,1));
            ?>
                <div class="initials"><?= $initials ?></div>
            <?php endif; ?>

            <div class="name"><?= htmlspecialchars($data['name']) ?></div>
            <div class="role"><?= htmlspecialchars($data['jobtitle'] ?? '') ?></div>

            <div class="section-title">CONTACT</div>
            <div class="item"><?= htmlspecialchars($data['email'] ?? '') ?></div>
            <div class="item"><?= htmlspecialchars($data['phone'] ?? '') ?></div>
            <div class="item"><?= htmlspecialchars($data['location'] ?? '') ?></div>

            <?php if (!empty($data['education'])): ?>
                <div class="section-title">EDUCATION</div>
                <div class="item"><?= nl2br(htmlspecialchars($data['education'])) ?></div>
            <?php endif; ?>

        </div>

        <!-- RIGHT -->
        <div class="right">

            <div class="big-name"><?= htmlspecialchars($data['name']) ?></div>
            <div class="sub">
                <?= htmlspecialchars(($data['jobtitle'] ?? '') . ' • ' . ($data['location'] ?? '')) ?>
            </div>

            <?php if (!empty($data['experiences'])): ?>
                <div class="section-title">EXPERIENCE_LOG</div>

                <?php foreach ($data['experiences'] as $exp): ?>
                    <div class="block">
                        <div class="exp-title"><?= htmlspecialchars($exp['title']) ?></div>
                        <div class="exp-company"><?= htmlspecialchars($exp['company']) ?></div>
                        <div class="exp-date"><?= htmlspecialchars($exp['date']) ?></div>
                        <div class="exp-desc"><?= nl2br(htmlspecialchars($exp['desc'])) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($data['skills'])): ?>
                <div class="section-title">SKILL_MATRIX</div>
                <div class="skills">
                    <?php foreach (explode(',', $data['skills']) as $skill): ?>
                        <span><?= htmlspecialchars(trim($skill)) ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>

    </div>
</div>

</body>
</html>
