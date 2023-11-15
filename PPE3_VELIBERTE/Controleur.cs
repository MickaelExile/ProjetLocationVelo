using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using System.Data;

namespace PPE3_VELIBERTE
{
    /// <summary>
    /// Controleur du projet VELIIBERTE
    /// </summary>
    public static class Controleur
    {
        #region propriétés
        private static Modele vmodele;
        #endregion

        #region accesseurs
        /// <summary>
        /// propriété Vmodele
        /// </summary>
        public static Modele Vmodele
        {
            get { return vmodele; }
            set { vmodele = value; }
        }
        #endregion

        #region methodes
        /// <summary>
        /// instanciation du modele
        /// </summary>
        public static void init()
        {
            Vmodele = new Modele();
        }

        /// <summary>
        /// permet le crud sur la table borne
        /// </summary>
        /// <param name="c">définit l'action : c:create, u update, d delete</param>
        /// <param name="indice">indice de l'élément sélectionné à modifier ou supprimer, -1 si ajout</param>
        public static void crud_borne(Char c, int indice)
        {
            if (c == 'd') // cas de la suppression
            {
                //   DialogResult rep = MessageBox.Show("Etes-vous sûr de vouloir supprimer ce constructeur "+ vmodele.DTConstructeur.Rows[indice][1].ToString()+ " ? ", "Confirmation", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
                DialogResult rep = MessageBox.Show("Etes-vous sûr de vouloir supprimer cette borne " + vmodele.DT[1].Rows[indice][1].ToString() + " ? ", "Confirmation", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
                if (rep == DialogResult.Yes)
                {
                    // on supprime l’élément du DataTable
                    vmodele.DT[1].Rows[indice].Delete();		// suppression dans le DataTable
                    vmodele.DA[1].Update(vmodele.DT[1]);			// mise à jour du DataAdapter
                }
            }
            else
            {
                // cas de l'ajout et modification
                FormCRUDBorne formCRUD = new FormCRUDBorne();  // création de la nouvelle forme
                if (c == 'c')  // mode ajout donc pas de valeur à passer à la nouvelle forme
                {
                    formCRUD.TbNomBorne.Clear();
                    formCRUD.TbNomAdresseRue.Clear();
                    formCRUD.TbnumAdresseRue.Clear();
                }

                if (c == 'u')   // mode update donc on récupère les champs
                {
                    // on remplit les zones par les valeurs du dataGridView correspondantes
                    formCRUD.TbNomBorne.Text = vmodele.DT[1].Rows[indice][1].ToString();
                    formCRUD.TbnumAdresseRue.Text = vmodele.DT[1].Rows[indice][2].ToString();
                    formCRUD.TbNomAdresseRue.Text = vmodele.DT[1].Rows[indice][3].ToString();


                }
                // on affiche la nouvelle form
                formCRUD.ShowDialog();

                // si l’utilisateur clique sur OK
                if (formCRUD.DialogResult == DialogResult.OK)
                {
                    if (c == 'c') // ajout
                    {
                        // on crée une nouvelle ligne dans le dataView
                        if (formCRUD.TbNomBorne.Text != "" && formCRUD.TbNomAdresseRue.Text != "" )
                        {
                            DataRow NouvLigne = vmodele.DT[1].NewRow();
                            NouvLigne["nomB"] = formCRUD.TbNomBorne.Text;
                            if (formCRUD.TbnumAdresseRue.Text != "") NouvLigne["numRueB"] = formCRUD.TbnumAdresseRue.Text;
                            NouvLigne["nomRueB"] = formCRUD.TbNomAdresseRue.Text;
                            vmodele.DT[1].Rows.Add(NouvLigne);
                            vmodele.DA[1].Update(vmodele.DT[1]);
                        }
                        else
                            MessageBox.Show("Erreur : il faut saisir au moins la nom et la rue", "Erreur", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }

                    if (c == 'u')  // modif
                    {
                        if (formCRUD.TbNomBorne.Text != "" && formCRUD.TbNomAdresseRue.Text != "")
                        {
                            // on met à jour le dataTable avec les nouvelles valeurs
                            vmodele.DT[1].Rows[indice]["nomB"] = formCRUD.TbNomBorne.Text;
                            if (formCRUD.TbnumAdresseRue.Text != "") vmodele.DT[1].Rows[indice]["numRueB"] = formCRUD.TbnumAdresseRue.Text;
                            vmodele.DT[1].Rows[indice]["nomRueB"] = formCRUD.TbNomAdresseRue.Text;
                            vmodele.DA[1].Update(vmodele.DT[1]);
                        }
                        else
                            MessageBox.Show("Erreur : il faut saisir au moins la nom et la rue", "Erreur", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }

                    MessageBox.Show("OK : données enregistrées Borne");
                    formCRUD.Dispose();  // on ferme la form
                }
                else
                {
                    MessageBox.Show("Annulation : aucune donnée enregistrée Borne");
                    formCRUD.Dispose();
                }
            }
        }

        /// <summary>
        /// permet le crud sur la table adherent
        /// </summary>
        /// <param name="c">définit l'action : c:create, u update, d delete </param>
        /// <param name="indice">indice de l'élément sélectionné à modifier ou supprimer, -1 si ajout</param>
         public static void crud_adherent(Char c, int indice)
        {
            if (c == 'd')  // suppression
            {
                // à compléter
            }
            else
            {
                FormCRUDAdherent formCRUD = new FormCRUDAdherent();  // création de la nouvelle forme
                if (c == 'c')  // mode ajout donc pas de valeur à passer à la nouvelle forme
                {
                    // à écrire : mettre les contrôles de formCRUD à vide
                    formCRUD.TbNom.Clear();
                    formCRUD.TbPrenom.Clear();
                    formCRUD.MtbCP.Clear();
                    formCRUD.TbAdresse.Clear();
                    formCRUD.TbVille.Clear();
                    formCRUD.MtbTel.Clear();
                    formCRUD.MtbTel.Text = "0";
                }

                if (c == 'u')   // mode update donc on récupère les champs
                {
                   // à compléter
                }

            eti:
                // on affiche la nouvelle form
                formCRUD.ShowDialog();

                // si l’utilisateur clique sur OK
                if (formCRUD.DialogResult == DialogResult.OK)
                {
                    if (c == 'c') // ajout
                    {
                        bool valid = true;
                        // on crée une nouvelle ligne dans le dataView
                        if (formCRUD.TbNom.Text != "" && formCRUD.TbPrenom.Text != "" && formCRUD.MtbCP.Text != "" && formCRUD.TbAdresse.Text != "" && formCRUD.TbVille.Text != "" && formCRUD.MtbTel.Text != "0 /  /  /  /")
                        {
                            DataRow NouvLigne = vmodele.DT[2].NewRow();
                            NouvLigne["nomA"] = formCRUD.TbNom.Text;
                            NouvLigne["prenomA"] = formCRUD.TbPrenom.Text;

                            if (formCRUD.MtbCP.Text != "")
                            {
                                if (Convert.ToInt32(formCRUD.MtbCP.Text) >= 1000 && Convert.ToInt32(formCRUD.MtbCP.Text) <= 99999)
                                {
                                    NouvLigne["cpA"] = formCRUD.MtbCP.Text;
                                }
                                else valid = false;
                                    
                            }

                            NouvLigne["adresseRueA"] = formCRUD.TbAdresse.Text;
                           

                            NouvLigne["villeA"] = formCRUD.TbVille.Text;
                            

                            if (formCRUD.MtbTel.Text != "0 /  /  /  /")
                            {
                                if (formCRUD.MtbTel.Text.Length == 14) NouvLigne["telA"] = formCRUD.MtbTel.Text;
                                else valid = false;
                            }

                            if (valid)
                            {
                                vmodele.DT[2].Rows.Add(NouvLigne);
                                vmodele.DA[2].Update(vmodele.DT[2]);
                            }
                            else
                            {
                                MessageBox.Show("Erreur dans la saisie", "Erreur", MessageBoxButtons.OK, MessageBoxIcon.Error);
                                // ne pas fermer la form : revenir avant le bouton OK
                                goto eti;
                            }
                        }
                        else
                        {
                            MessageBox.Show("Erreur : il faut tout saisir", "Erreur", MessageBoxButtons.OK, MessageBoxIcon.Error);
                            // ne pas fermer la form : revenir avant le bouton OK
                            goto eti;
                        }
                    }

                    if (c == 'u')  // modif
                    {
                        // à compléter
                    }


                    formCRUD.Dispose();  // on ferme la form
                }
                else
                {
                    MessageBox.Show("Annulation : aucune donnée enregistrée");
                    formCRUD.Dispose();
                }
            }
        }
        #endregion
        
    }
}
