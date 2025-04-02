(() => {
    gsap.registerPlugin(ScrollTrigger);
    console.log ("Napas")

    const aboutCon = document.querySelector("#about");
    const profSkill = document.querySelector(".prof-skill");
    const SkillOne = document.querySelector("#skill-1");
    const SkillTwo = document.querySelector("#skill-2");
    const UiTitle = document.querySelector(".title");
    const GraphicTitle = document.querySelector(".title2");
    const ExperiencesTitle = document.querySelector(".experiences-title");
    const ExperiencesCard = document.querySelector(".experience-card");
    const numOne = document.querySelector(".num1");
    const numTwo = document.querySelector(".num2");
    const numThree = document.querySelector(".num3");
    const CaseTitle = document.querySelector("#case-title");
    const Challenge = document.querySelector("#case-head");

    gsap.set(aboutCon, { opacity: 0, x: -100 });
    gsap.to(aboutCon, {
        opacity: 1,
        x: 0,
        duration: .8,

        scrollTrigger: {
            trigger: aboutCon,
            toggleActions: "play pause resume pause",
            start: '-20% center',
            end: 'bottom bottom',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(profSkill, { opacity: 0, x: -100 });
    gsap.to(profSkill, {
        opacity: 1,
        x: 0,
        duration: .8,

        scrollTrigger: {
            trigger: profSkill,
            toggleActions: "play pause resume pause",
            start: '-20% center',
            end: 'bottom bottom',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(SkillOne, { opacity: 0, x: -100 });
    gsap.to(SkillOne, {
        opacity: 1,
        x: 0,
        duration: .8,

        scrollTrigger: {
            trigger: SkillOne,
            toggleActions: "play pause resume pause",
            start: '-20% center',
            end: 'bottom bottom',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(SkillTwo, { opacity: 0, x: -100 });
    gsap.to(SkillTwo, {
        opacity: 1,
        x: 0,
        duration: .8,

        scrollTrigger: {
            trigger: SkillTwo,
            toggleActions: "play pause resume pause",
            start: '-20% center',
            end: 'bottom bottom',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(UiTitle, { opacity: 0, x: 100 });
    gsap.to(UiTitle, {
        opacity: 1,
        x: 0,
        duration: .8,

        scrollTrigger: {
            trigger: UiTitle,
            toggleActions: "play pause resume pause",
            start: '-80% center',
            end: '110% bottom',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(GraphicTitle, { opacity: 0, x: -100 });
    gsap.to(GraphicTitle, {
        opacity: 1,
        x: 0,
        duration: .8,

        scrollTrigger: {
            trigger: GraphicTitle,
            toggleActions: "play pause resume pause",
            start: '-80% center',
            end: '110% bottom',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(ExperiencesTitle, { opacity: 0, x: 100 });
    gsap.to(ExperiencesTitle, {
        opacity: 1,
        x: 0,
        duration: .8,

        scrollTrigger: {
            trigger: ExperiencesTitle,
            toggleActions: "play pause resume pause",
            start: '-80% center',
            end: '110% bottom',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(ExperiencesCard, { opacity: 0, x: -100 });
    gsap.to(ExperiencesCard, {
        opacity: 1,
        x: 0,
        duration: 1,

       

    });

    gsap.set(numOne, { opacity: 0, x: -100 });
    gsap.to(numOne, {
        opacity: 1,
        x: 0,
        duration: 1,

        scrollTrigger: {
            trigger: numOne,
            toggleActions: "play pause resume pause",
            start: '-110% 30%',
            end: '20% 30%',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(numTwo, { opacity: 0, x: -100 });
    gsap.to(numTwo, {
        opacity: 1,
        x: 0,
        duration: 1,

        scrollTrigger: {
            trigger: numTwo,
            toggleActions: "play pause resume pause",
            start: '-120% 30%',
            end: '20% 20%',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(numThree, { opacity: 0, x: -100 });
    gsap.to(numThree, {
        opacity: 1,
        x: 0,
        duration: 1,

        scrollTrigger: {
            trigger: numThree,
            toggleActions: "play pause resume pause",
            start: '-130% 30%',
            end: '20% 10%',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(CaseTitle, { opacity: 0, x: -100 });
    gsap.to(CaseTitle, {
        opacity: 1,
        x: 0,
        duration: 1,


    });

    gsap.set(Challenge, { opacity: 0, x: -100 });
    gsap.to(Challenge, {
        opacity: 1,
        x: 0,
        duration: 1,

      

    });

    

    
})();