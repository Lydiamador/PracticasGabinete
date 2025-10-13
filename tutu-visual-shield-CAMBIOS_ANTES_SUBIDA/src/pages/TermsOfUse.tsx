import { useEffect } from "react";

const TermsOfUse = () => {
  useEffect(() => {
    // Set page title
    document.title = "Términos de Uso - Tu&Tu";
    
    // Set meta description
    const metaDescription = document.querySelector('meta[name="description"]');
    if (metaDescription) {
      metaDescription.setAttribute('content', 'Términos de uso de Tu&Tu - Plataforma de protección digital para menores y colectivos vulnerables.');
    }
  }, []);

  return (
    <div className="min-h-screen bg-background text-foreground">
      {/* Header Section */}
      <div className="section-padding bg-background-secondary border-b border-border/20">
        <div className="container-grid">
          <div className="text-center max-w-3xl mx-auto">
            <h1 className="font-display text-4xl sm:text-5xl gradient-text mb-6">
              Términos de Uso
            </h1>
            <p className="text-sm text-foreground/60">
              Fecha de entrada en vigor: 14 de julio de 2025
            </p>
          </div>
        </div>
      </div>

      {/* Content Section */}
      <div className="section-padding">
        <div className="container-grid">
          <div className="max-w-4xl mx-auto">
            <div className="prose prose-invert max-w-none">
              
              {/* Section 1 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  1. Aceptación de los términos
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    El uso de la plataforma TU&TU implica la aceptación plena y sin reservas de los presentes Términos de Uso. Si no estás de acuerdo con alguno de ellos, por favor, abstente de utilizar nuestros servicios.
                  </p>
                </div>
              </section>

              {/* Section 2 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  2. Servicio ofrecido
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    TU&TU es una herramienta de protección digital que modifica imágenes de forma imperceptible para evitar que sean utilizadas por sistemas de inteligencia artificial con fines abusivos o no autorizados. Su objetivo es proteger la privacidad y la dignidad de menores y colectivos vulnerables en entornos digitales.
                  </p>
                </div>
              </section>

              {/* Section 3 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  3. Uso permitido
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed mb-4">
                    El usuario se compromete a:
                  </p>
                  <ul className="list-disc list-inside space-y-3 text-foreground/80 ml-4">
                    <li>Usar TU&TU exclusivamente con fines legales y personales.</li>
                    <li>No emplear la herramienta con fines comerciales sin previa autorización.</li>
                    <li>No descompilar, copiar, modificar o alterar el funcionamiento de la plataforma.</li>
                    <li>No utilizar el sistema para fines contrarios a los derechos fundamentales o la legislación vigente.</li>
                  </ul>
                </div>
              </section>

              {/* Section 4 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  4. Propiedad intelectual
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    Todos los derechos de propiedad intelectual e industrial sobre TU&TU, incluyendo software, diseños, logotipos, marcas, textos y contenidos audiovisuales, pertenecen a sus desarrolladores. Queda expresamente prohibida su reproducción total o parcial sin consentimiento previo y por escrito.
                  </p>
                </div>
              </section>

              {/* Section 5 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  5. Exoneración de responsabilidad
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    TU&TU adopta las mejores medidas técnicas para garantizar la protección de las imágenes procesadas, pero no puede asegurar una defensa absoluta frente a todos los modelos de inteligencia artificial existentes o futuros. No nos responsabilizamos por el uso no autorizado de imágenes fuera del ámbito de nuestra plataforma.
                  </p>
                </div>
              </section>

              {/* Section 6 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  6. Disponibilidad y modificaciones
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed mb-4">
                    TU&TU se reserva el derecho a modificar, suspender o interrumpir temporal o permanentemente su plataforma, sin necesidad de previo aviso, por motivos técnicos, legales o de seguridad.
                  </p>
                  <p className="text-foreground/80 leading-relaxed">
                    Asimismo, se reserva el derecho de actualizar los presentes Términos de Uso. Los cambios serán comunicados en el sitio web con antelación suficiente. El uso continuado del servicio tras dichos cambios implica su aceptación.
                  </p>
                </div>
              </section>

              {/* Section 7 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  7. Legislación aplicable y jurisdicción
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    Estos Términos de Uso se rigen por la legislación española y europea. En caso de disputa o conflicto, las partes se someterán a los Juzgados y Tribunales de Madrid, España, con renuncia expresa a cualquier otro fuero que pudiera corresponderles.
                  </p>
                </div>
              </section>

            </div>

            {/* Call to Action */}
            <div className="mt-16 text-center">
              <div className="glass-panel-strong p-8">
                <h3 className="font-display text-xl gradient-text mb-4">
                  ¿Tienes alguna pregunta?
                </h3>
                <p className="text-foreground/70 mb-6">
                  Si necesitas aclarar cualquier aspecto de estos términos, no dudes en contactarnos.
                </p>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default TermsOfUse;