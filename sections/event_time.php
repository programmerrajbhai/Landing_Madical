<style>
:root{
  --primary:#38BDF8;
  --primary-glow:rgba(56,189,248,.45);

  --bg-card:rgba(15,23,42,.72);
  --bg-pill:rgba(15,23,42,.65);

  --border-soft:rgba(148,163,184,.15);
  --text-main:#E5E7EB;
  --text-muted:#94A3B8;
}

.live-zoom-wrap{
  max-width:1100px;
  margin:40px auto 0;
  padding:46px 36px 40px;
  border-radius:42px;
  position:relative;
  overflow:hidden;

  background:
    radial-gradient(600px 240px at 50% -40px, rgba(56,189,248,.20), transparent 60%),
    linear-gradient(180deg, rgba(2,6,23,.85), rgba(2,6,23,.95));
  border:1px solid rgba(148,163,184,.12);
  box-shadow:0 30px 90px rgba(2,6,23,.9);
}

/* top pill */
.live-pill{
  position:absolute;
  top:16px;
  left:50%;
  transform:translateX(-50%);
  display:flex;
  align-items:center;
  gap:10px;
  padding:10px 20px;
  border-radius:999px;
  background:var(--bg-pill);
  border:1px solid var(--border-soft);
  backdrop-filter:blur(14px);
  color:#7DD3FC;
  font-weight:700;
  font-size:14px;
}

.live-pill .dot{
  width:9px;
  height:9px;
  border-radius:50%;
  background:#38BDF8;
  box-shadow:0 0 0 4px rgba(56,189,248,.25);
}

/* cards */
.live-row{
  margin-top:58px;
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:22px;
}

.live-card{
  display:flex;
  align-items:center;
  gap:18px;
  padding:22px 26px;
  border-radius:22px;
  background:var(--bg-card);
  border:1px solid var(--border-soft);
  backdrop-filter:blur(18px);
  box-shadow:0 20px 60px rgba(2,6,23,.7);
}

/* icon */
.live-icon{
  width:56px;
  height:56px;
  border-radius:18px;
  display:grid;
  place-items:center;
  background:linear-gradient(135deg, rgba(56,189,248,.25), rgba(56,189,248,.05));
  border:1px solid rgba(56,189,248,.35);
  color:#38BDF8;
  font-size:22px;
  box-shadow:0 0 20px var(--primary-glow);
}

/* text */
.live-title{
  font-size:26px;
  font-weight:800;
  color:var(--text-main);
  margin:0;
}

.live-sub{
  font-size:22px;
  font-weight:700;
  color:var(--text-main);
  margin-top:6px;
}

.live-time{
  font-size:26px;
  font-weight:800;
  color:var(--text-main);
  margin:0;
}

@media(max-width:900px){
  .live-row{grid-template-columns:1fr;}
}
</style>

<section class="live-zoom-wrap">
  <div class="live-pill">
    <span class="dot"></span>
    Limited Seats • Live Zoom
  </div>

  <div class="live-row">
    <!-- Zoom -->
    <div class="live-card">
      <div class="live-icon">
        <i class="fa-solid fa-video"></i>
      </div>
      <div>
        <div class="live-title">Zoom</div>
        <div class="live-sub">Live MasterClass</div>
      </div>
    </div>

    <!-- Time -->
    <div class="live-card">
      <div class="live-icon">
        <i class="fa-regular fa-clock"></i>
      </div>
      <div>
        <div class="live-time">February 21 • 12:00 PM CST</div>
      </div>
    </div>
  </div>
</section>
