import { useEffect, useRef, useState } from "react";

const stats = [
  {
    number: "98%",
    text: "de todo el contenido deepfake es pornográfico",
    source: "europarl.europa.eu"
  },
  {
    number: "20,000",
    text: "imágenes de abuso infantil generadas por IA en un solo mes",
    source: "iwf.org.uk"
  },
  {
    number: "1 de cada 3",
    text: "adolescentes conoce a alguien víctima de deepfakes sexuales",
    source: "edweek.org"
  },
  {
    number: "+6%",
    text: "de material infantil deepfake en solo seis meses",
    source: "iwf.org.uk"
  }
];

export const PainStats = () => {
  const [visibleStats, setVisibleStats] = useState<number[]>([]);
  const sectionRef = useRef<HTMLElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          // Stagger the animation of each stat card
          stats.forEach((_, index) => {
            setTimeout(() => {
              setVisibleStats(prev => [...prev, index]);
            }, index * 150);
          });
        }
      },
      { threshold: 0.2 }
    );

    if (sectionRef.current) {
      observer.observe(sectionRef.current);
    }

    return () => observer.disconnect();
  }, []);

  return (
    <section ref={sectionRef} className="section-padding bg-gradient-to-b from-background to-background-secondary">
      <div className="container-grid">
        {/* Section Header */}
        <div className="text-center mb-20">
          <h2 className="font-display text-display gradient-text mb-6">
            El dolor que duele
          </h2>
          <p className="text-body-large text-foreground/70 max-w-3xl mx-auto">
            Las IAs generativas han convertido cada foto en materia prima para el abuso digital. En esa guerra silenciosa, <strong>menores, mujeres y colectivos vulnerables son la primera línea de fuego.</strong>
          </p>
        </div>

        {/* Stats Grid - Responsive with Min Height */}
        <div className="grid grid-cols-2 sm:grid-cols-4 gap-6 mb-20">
          {stats.map((stat, index) => (
            <div
              key={index}
              className={`glass-panel-strong p-8 text-center hover:scale-105 group cursor-pointer transition-all duration-800 min-h-[160px] flex flex-col justify-center focus-visible:scale-105 ${
                visibleStats.includes(index) ? 'animate-scale-in opacity-100' : 'opacity-0'
              }`}
              tabIndex={0}
              role="article"
            >
              <div className="gradient-text text-3xl lg:text-4xl xl:text-5xl font-display mb-4 group-hover:scale-110 transition-transform duration-300">
                {stat.number}
              </div>
              <p className="text-body text-foreground/80 leading-relaxed mb-4 font-inter">
                {stat.text}
              </p>
              <div className="text-small text-foreground/60 font-mono bg-background-tertiary px-3 py-1 rounded-full inline-block">
                {stat.source}
              </div>
            </div>
          ))}
        </div>
        
        {/* Impact Quote */}
        <div className="text-center">
          <div className="glass-panel p-10 max-w-4xl mx-auto">
            <blockquote className="text-display font-display text-foreground/90 italic leading-tight">
              "No es un simple filtro: es la primera línea de defensa antes de que la herida ocurra."
            </blockquote>
            <div className="w-24 h-1 bg-gradient-primary mx-auto mt-6 rounded-full"></div>
          </div>
        </div>
      </div>
    </section>
  );
};