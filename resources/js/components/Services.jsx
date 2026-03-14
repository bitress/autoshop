import React from 'react';

const SERVICES = [
  {
    num: '01',
    icon: '💡',
    name: 'Optics Retrofit',
    sub: 'Headlight Specialization',
    items: [
      'Headlights & Foglights Upgrade',
      'Angel & Demon Eyes Installation',
      'DRL Installation & Replacement',
      'Precision Laser Alignment',
      'HID / LED Projector Conversion',
    ],
  },
  {
    num: '02',
    icon: '🖥',
    name: 'Interface Ecosystem',
    sub: 'Android Headunit Specialization',
    items: [
      'Wireless CarPlay & Android Auto',
      '360 Surround Camera Integration',
      'OEM-Style Factory Fit Bezel',
      'Octacore High-Performance SoC',
      'DSP Audio & Equalizer Setup',
    ],
  },
];

export default function Services() {
  return (
    <section id="services" className="services-section">
      <div className="container">

        {/* Header */}
        <div className="section-header">
          <p className="section-num">// SECTION 02 — SPECIALIZATIONS</p>
          <h2 className="section-title">Lab Services</h2>
        </div>

        {/* Blueprint grid */}
        <div className="services-grid">
          {SERVICES.map(s => (
            <div key={s.num} className="service-module">
              <div className="module-num">{s.num} / {s.sub}</div>

              <div className="module-icon-row">
                <span className="module-icon">{s.icon}</span>
                <h3 className="module-name">{s.name}</h3>
              </div>

              <ul className="module-list">
                {s.items.map(item => (
                  <li key={item}>
                    <span className="module-bullet" />
                    {item}
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>

      </div>
      <div className="scanline-divider" style={{ marginTop: 80 }} />
    </section>
  );
}
