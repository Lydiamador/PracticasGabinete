import React from "react";
import { Facebook, Linkedin, Mail, Instagram } from "lucide-react";

export default function Contact() {
  return (
    <section className="min-h-screen w-full flex items-center justify-center bg-gradient-to-br from-background via-background/70 to-background/50 px-6 py-16">
      <div className="max-w-5xl w-full grid lg:grid-cols-2 gap-8 glass-panel-strong rounded-3xl p-8 animate-fade-in">
        {/* Columna Izquierda - Información */}
        <div className="flex flex-col justify-center space-y-6">
          <h1 className="text-hero font-bold text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent animate-gradient-x">
            Contáctanos
          </h1>

          <p className="text-body text-muted-foreground">
            Este proyecto es un gran emprendimiento y esperamos que se convierta en una verdadera revolución. 
            Nuestro objetivo es acabar con el abuso mediante inteligencia artificial y proteger nuestras fotos más queridas, manteniéndolas siempre seguras y bajo control.
            Si tienes cualquier duda, aquí tienes toda nuestra información de contacto.
          </p>

          <div className="space-y-4">
            <div className="flex items-center gap-3 group hover:text-primary transition-colors">
              <Mail className="w-6 h-6 text-primary" aria-hidden />
              <span className="text-body-large">protegeme@tuytu.com</span>
            </div>
          </div>

          <div className="flex gap-5 pt-4">
            {/* Instagram */}
            <div className="inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary/10 hover:bg-primary/20 transition-all hover:scale-110">
              
              <a href="https://www.instagram.com/tuytu.tech/" target="_blank" rel="noopener noreferrer">
                <Instagram className="w-5 h-5 text-primary" aria-hidden />
                </a>

              
            </div>

            {/* LinkedIn */}
            <div className="inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary/10 hover:bg-primary/20 transition-all hover:scale-110">
               <a href="https://www.linkedin.com/in/tuytu-tech-04a075378/" target="_blank" rel="noopener noreferrer">
              <Linkedin className="w-5 h-5 text-primary" aria-hidden />
                </a>
            </div>
          </div>
        </div> {/* <-- Cerramos la columna izquierda aquí */}
       
        {/* Columna Derecha - Logo */}
        <div className="rounded-2xl overflow-hiddentransition-all animate-fade-in-up flex items-center justify-center p-6">
        <img
            src="/lovable-uploads/f1a3799d-599c-4cb7-8a2b-05f9c9112e76.png" // ruta de tu logo
            alt="Logo Tu&Tu"
            className="max-w-full max-h-72 object-contain"
        />
        </div>

        {/* Columna Derecha - Mapa
        <div className="rounded-2xl overflow-hidden glass-panel hover:shadow-lg transition-all animate-fade-in-up">
          <iframe
            title="Ubicación"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.0221566418785!2d2.17004!3d41.3870155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2f1b42e8e0d%3A0x4f6f4e9b1e88ff8f!2sBarcelona!5e0!3m2!1ses!2ses!4v1695654476017!5m2!1ses!2ses"
            width="100%"
            height="350"
            allowFullScreen
            loading="lazy"
            className="border-0 w-full h-[350px]"
          />
        </div>*/}
      </div> 
    </section>
  );
}
