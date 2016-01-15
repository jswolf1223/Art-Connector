'''
Created on Feb 1, 2015

@author: Sam
'''
import numpy as np
import cv2
import csv
import sys
from PIL import Image 
from Tkconstants import TOP
from operator import itemgetter
import os.path
import Tkinter as tk

#  ArtWork class includes methods for finding the average RGB value of an image,
#  returning a list of similar artworks, writing an artwork and it's data to a csv file
#  and a static method for returning all the artist's names.


class ArtWork:
    
    def __init__(self,name,title, img,filename):
    
        self.name = name
        self.title = title
        self.img = img
        self.filename =filename
        self.description = "This piece has not been described yet"
        self.rgb = self.rgbAverage(filename)
        self.statcsv = "C:\Users\Sam\workspace\ArtConnector\sam\project\ArtWorks\ArtWorks.csv"
    
   
    def rgbAverage (self, filename):
        
        # open the image
        img = Image.open(filename)
        # grab width and height
        width, height = img.size
        # make a list of all pixels in the image
        pixels = img.load()
        data = []
        for x in range(width):
            for y in range(height):
                cpixel = pixels[x, y]
                data.append(cpixel)
        r = 0
        g = 0
        b = 0
        counter = 0
     
        # loop through all pixels
        # if alpha value is greater than 200/255, add it to the average
        # (note: could also use criteria like, if not a black pixel or not a white pixel...)
        for x in range(len(data)):
            try:
                if data[x][3] > 0:
                    r+=data[x][0]
                    g+=data[x][1]
                    b+=data[x][2]
            except:
                r+=data[x][0]
                g+=data[x][1]
                b+=data[x][2]
     
            counter+=1
     
        # compute average RGB values
        rAvg = r/counter
        gAvg = g/counter
        bAvg = b/counter
 
        return rAvg, gAvg, bAvg
        
    
    def write(self, name, title, filename, rgb, count, anger, anticipation, 
              joy, trust, fear, surprise, sadness, disgust):
        
        if name != "Artist's Name":
            f = open(self.statcsv, 'ab')
            try:
                writer = csv.writer(f)
                writer.writerow( (name, title, filename, rgb, count,  anger, anticipation, joy, 
                                  trust, fear, surprise, sadness, disgust ) )
            finally:
                f.close()
                

    @staticmethod
    def getAllArtists():
       
        with open("C:\Users\Sam\workspace\ArtConnector\sam\project\ArtWorks\ArtWorks.csv", 'rt') as f:
            artists = []
            reader = csv.reader(f, delimiter=',')
            check = ""
            for row in reader:
                if  row[0] != check : 
                    artists.append(row[0])
                    check = row[0]
            
            final = list(set(artists))        
            final.sort()
            return final
        
   
    @staticmethod
    def getSimilarArtWork(artwork):
       
        statcsv = "C:\Users\Sam\workspace\ArtConnector\sam\project\ArtWorks\ArtWorks.csv"
        with open(statcsv, 'rt') as f:
            reader =csv.reader(f, delimiter = ',')
            source = []
            rValueSrc,gValueSrc,bValueSrc = 0,0,0
            for row in reader:
                if row[1]== artwork:                   
                    rValueSrc,gValueSrc,bValueSrc =eval(row[3])
                    rValueSrc,gValueSrc,bValueSrc= float(rValueSrc/20.0),float(gValueSrc/20.0),float(bValueSrc/20.0)
                    source.append(row[2])
                    attr = 5
                    for x in range(8):
                        source.append(float(row[attr])/float(row[4]))
                        attr += 1 
        
        with open(statcsv, 'rt') as f:
            reader2 =csv.reader(f, delimiter = ',')          
            artworks = []
            
            for row in reader2:
                if row[1] != artwork:
                    work = []
                    work.append(row[2])
                    rValue,gValue,bValue =eval(row[3])
                    rValue,gValue,bValue= float(rValue/20.0),float(gValue/20.0),float(bValue/20.0)
                    attr = 5
                    totalDist =0
                    
                    for x in range(8):
                        totalDist += abs(source[x+1]-(float(row[attr])/float(row[4])))
                        attr += 1
                    totalDist += abs(rValue-rValueSrc) +abs(gValue-gValueSrc)+ abs(bValue-bValueSrc)
                   
                    work.append(totalDist)
                    artworks.append(work)
            sortedworks = sorted(artworks, key =itemgetter(1))         
            finalList = []
            size = 100, 100
            for simWork in sortedworks[0:8]:
                print simWork[0]
                imgobj = Image.open(simWork[0])
                imgobj.thumbnail(size, Image.ANTIALIAS)                        
                finalList.append((simWork[0],imgobj))
            return finalList
    
    
    def getWork(self,filename, title):
    
        with open(filename, 'rt') as f:
            reader = csv.reader(f, delimiter=',')
            for row in reader:
                if title == row[1]:
                    return row 
           
    
    def getRGB(self, title):
        
        with open(self.statcsv, 'rt') as f:
            reader = csv.reader(f, delimiter=',')
            for row in reader:
                if title == row[1]:
                    return row[3]
                
                
    
    
    
              
                           


